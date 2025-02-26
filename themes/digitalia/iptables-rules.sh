#!/bin/bash

# Limpiar todas las reglas existentes
iptables -F
iptables -X
iptables -Z

# Establecer políticas predeterminadas
iptables -P INPUT DROP
iptables -P FORWARD DROP
iptables -P OUTPUT ACCEPT

# Permitir conexiones establecidas y relacionadas
iptables -A INPUT -m state --state ESTABLISHED,RELATED -j ACCEPT

# Permitir localhost
iptables -A INPUT -i lo -j ACCEPT

# Protección contra ataques comunes
# Anti-spoofing
iptables -A INPUT -s 127.0.0.0/8 ! -i lo -j DROP
iptables -A INPUT -s 0.0.0.0/8 -j DROP
iptables -A INPUT -s 169.254.0.0/16 -j DROP
iptables -A INPUT -s 172.16.0.0/12 -j DROP
iptables -A INPUT -s 192.168.0.0/16 -j DROP
iptables -A INPUT -s 10.0.0.0/8 -j DROP
iptables -A INPUT -s 224.0.0.0/4 -j DROP
iptables -A INPUT -s 240.0.0.0/5 -j DROP

# Protección contra ataques de tipo TCP
iptables -A INPUT -p tcp ! --syn -m state --state NEW -j DROP
iptables -A INPUT -p tcp --tcp-flags ALL NONE -j DROP
iptables -A INPUT -p tcp --tcp-flags ALL ALL -j DROP

# SSH con límite de conexiones
iptables -A INPUT -p tcp --dport 22 -m state --state NEW -m recent --set
iptables -A INPUT -p tcp --dport 22 -m state --state NEW -m recent --update --seconds 60 --hitcount 4 -j DROP
iptables -A INPUT -p tcp --dport 22 -j ACCEPT

# Reglas para LiteSpeed
iptables -A INPUT -p tcp --dport 8088 -j ACCEPT  # Puerto admin de LiteSpeed
iptables -A INPUT -p tcp --dport 7080 -j ACCEPT  # Puerto WebAdmin LiteSpeed
iptables -A INPUT -p tcp -m multiport --dports 80,443 -j ACCEPT  # HTTP/HTTPS

# Reglas específicas para WordPress
# Permitir conexiones MySQL
iptables -A INPUT -p tcp --dport 3306 -s localhost -j ACCEPT

# Permitir FTP pasivo (si es necesario)
iptables -A INPUT -p tcp --dport 21 -j ACCEPT
iptables -A INPUT -p tcp --dport 50000:50100 -j ACCEPT

# Permitir DNS
iptables -A INPUT -p udp --dport 53 -j ACCEPT
iptables -A INPUT -p tcp --dport 53 -j ACCEPT

# Permitir ICMP (ping) con límite de tasa
iptables -A INPUT -p icmp --icmp-type echo-request -m limit --limit 1/s -j ACCEPT

# Protección contra escaneo de puertos
iptables -A INPUT -p tcp --tcp-flags ALL NONE -j DROP
iptables -A INPUT -p tcp --tcp-flags ALL FIN,URG,PSH -j DROP
iptables -A INPUT -p tcp --tcp-flags ALL SYN,RST,ACK,FIN,URG -j DROP
iptables -A INPUT -p tcp --tcp-flags SYN,RST SYN,RST -j DROP
iptables -A INPUT -p tcp --tcp-flags SYN,FIN SYN,FIN -j DROP

# Protección DDoS
iptables -A INPUT -p tcp --dport 80 -m limit --limit 25/minute --limit-burst 100 -j ACCEPT
iptables -A INPUT -p tcp --dport 443 -m limit --limit 25/minute --limit-burst 100 -j ACCEPT

# Registrar paquetes rechazados
iptables -A INPUT -j LOG --log-prefix "IPTables-Rechazado: " --log-level 7

# Regla final: rechazar todo lo demás
iptables -A INPUT -j DROP

# Guardar las reglas (asegúrate de tener iptables-persistent instalado)
# sudo service iptables save
