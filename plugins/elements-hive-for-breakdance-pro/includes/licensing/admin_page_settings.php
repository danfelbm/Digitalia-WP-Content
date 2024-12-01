<?php

// Base stuff of EDD: I should re-write it so it's more modern or whatever but EH doesn't really need
// any admin settings other than license so we'll see.

// stole the rest from breakdance. Thanks!

/**
 * Adds the plugin license page to the admin menu.
 *
 * @return void
 */
function elements_hive_pro_license_menu () {
	add_menu_page(
		'Elements Hive Pro',
		'Elements Hive Pro',
		'manage_options',
		ELEMENTS_HIVE_PRO_PLUGIN_LICENSE_PAGE,
		'elements_hive_pro_license_page',
        'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/Pgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDIwMDEwOTA0Ly9FTiIKICJodHRwOi8vd3d3LnczLm9yZy9UUi8yMDAxL1JFQy1TVkctMjAwMTA5MDQvRFREL3N2ZzEwLmR0ZCI+CjxzdmcgdmVyc2lvbj0iMS4wIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCiB3aWR0aD0iMjA0OC4wMDAwMDBwdCIgaGVpZ2h0PSIyMDQ4LjAwMDAwMHB0IiB2aWV3Qm94PSIwIDAgMjA0OC4wMDAwMDAgMjA0OC4wMDAwMDAiCiBwcmVzZXJ2ZUFzcGVjdFJhdGlvPSJ4TWlkWU1pZCBtZWV0Ij4KCjxnIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAuMDAwMDAwLDIwNDguMDAwMDAwKSBzY2FsZSgwLjEwMDAwMCwtMC4xMDAwMDApIgpmaWxsPSIjMDAwMDAwIiBzdHJva2U9Im5vbmUiPgo8cGF0aCBkPSJNMTQ2OTUgMjAxMjQgYy01NjMgLTQ2IC0xMDcxIC0yMjUgLTE1NjggLTU1MSAtMTE5MCAtNzgxIC0xNzkwCi0yMjg2IC0xNDUwIC0zNjM3IDEyNyAtNTA3IDM1MyAtOTMwIDcxNyAtMTM0MiBsNDYgLTUyIC00NyAtMzggYy0yNiAtMjIgLTU0Ci00NSAtNjIgLTUyIC05IC03IDE3IDMgNTYgMjMgNDAgMTkgNzUgMzUgNzggMzUgOCAwIDg1IC03MiA4NSAtODAgMCAtNCAtMjgKLTI3IC02MiAtNTEgLTE2OCAtMTE2IC0zMjggLTI1NyAtNTcyIC01MDMgLTE0MiAtMTQ0IC0yNTUgLTI1NSAtMjUxIC0yNDcgNSA5CjQgMTIgLTMgNyAtMTYgLTkgLTEwNCAtMTk2IC0xNDYgLTMwOSAtOTAgLTI0MSAtMTI4IC00MjAgLTE2MiAtNzYzIGwtNSAtNTIKLTkyIDM1IGMtMjkwIDEwOCAtNTgyIDE4MCAtOTExIDIyNSAtMjE5IDMwIC03NDYgMzMgLTk1NiA1IC0zOTEgLTUyIC03MzQKLTE0MiAtMTA3MiAtMjgyIC0xNiAtNiAtMTggMCAtMTkgNDYgLTEgMzAgLTQgNzkgLTkgMTA5IGwtNyA1NSAtMiAtNDkgYzAgLTI3Ci02IC03OCAtMTIgLTExMyBsLTExIC02MyAtMTM3IC03MCBjLTEzMiAtNjcgLTM1NyAtMTk4IC00OTEgLTI4NCAtOTAgLTU4IC05NAotNjEgLTg2IC00OCAzIDYgMiAxMyAtMyAxNiAtNSA0IC04IDE0IC02IDI0IDEgOSAtMiAyMyAtOCAzMCAtNSA2IC03IDEyIC0zCjEyIDMgMCAtMSAxNiAtOSAzNyAtMTMgMzEgLTE5IDU1IC0yOSAxMTEgLTEgOCAtOCAxNyAtMTUgMjEgLTcgNSAtMTIgMTEgLTExCjE1IDQgMTcgLTEzIDY2IC0yMyA2NiAtNyAwIC02IDQgMyAxMCAxMCA2IDExIDEwIDMgMTAgLTcgMCAtMTMgNiAtMTMgMTMgMCA3Ci04IDIyIC0xOCAzMyAtMTAgMTAgLTE2IDI2IC0xNCAzNiAyIDkgLTIgMjAgLTkgMjQgLTggNSAtOSAzIC00IC02IDUgLTkgNAotMTEgLTQgLTYgLTggNiAtOSAxMiAtMiAyMCAxMiAxNSAtNCAzNiAtMjggMzYgLTExIDAgLTEyIDMgLTQgOCA4IDUgOSAxMyAzCjIyIC02IDggLTEwIDExIC0xMCA1IDAgLTUgLTkgOSAtMjEgMzIgLTEyIDI0IC0yNSA0MSAtMzAgMzggLTQgLTMgLTE0IDEzIC0yMQozNiAtNiAyMyAtMTQgMzcgLTE2IDMwIC02IC0xOSAtMjAgLTEyIC0yNiAxNCAtNCAxNiAtMTEgMjIgLTIxIDE5IC0xMSAtNSAtMTMKLTIgLTkgMTAgMyA5IDEgMTYgLTUgMTYgLTYgMCAtMTAgMyAtMTAgOCA0IDIzIC0yIDQyIC0xMSAzNyAtOCAtNSAtOCAtMTEgMAotMjAgOCAtOSA4IC0xNSAwIC0yMCAtNSAtMyAtMTAgMSAtMTAgOSAwIDkgLTkgMjEgLTIwIDI4IC0xMSA3IC0yMCAxNyAtMjAgMjEKMCA1IC04IDE2IC0xOCAyNSAtMTAgMTAgLTExIDEzIC0yIDcgMTMgLTkgMTMgLTggMiA3IC03IDkgLTIyIDE1IC0zMyAxMyAtMTEKLTIgLTIyIDIgLTI2IDExIC0zIDggLTEyIDEzIC0xOSAxMCAtOSAtMyAtMTYgNCAtMjAgMTkgLTQgMTYgLTExIDIyIC0yMiAxOAotOSAtNCAtMTMgLTIgLTkgNCA0IDYgMCAxNCAtOSAxNyAtOCAzIC0xMiAyIC05IC00IDMgLTYgMiAtMTAgLTMgLTEwIC0xMSAwCi0yNiAzMCAtMjMgNDMgMSA1IC0zIDYgLTkgMiAtNiAtMyAtOCAtMTEgLTUgLTE2IDExIC0xOCAtMjIgLTkgLTQwIDExIC0xMCAxMQotMjIgMTcgLTI4IDEzIC02IC00IC03IC0xIC0xIDggMTQgMjIgMTUgNDQgMSAzMCAtMTUgLTE1IC0yNyAtMTQgLTI3IDQgMCA4Ci01IDE1IC0xMSAxNSAtNSAwIC04IC00IC01IC04IDIgLTQgLTQgLTggLTE0IC04IC0xNCAwIC0xNiA0IC05IDEyIDcgOCA2IDE1Ci0yIDIwIC04IDQgLTkgMyAtNSAtNCAxNCAtMjMgLTIxIC0xMiAtNDUgMTQgLTEzIDE0IC0zNCAzMCAtNDcgMzUgLTEzIDUgLTIxCjEzIC0xOCAxOCA0IDUgLTIgOCAtMTEgNyAtMjYgLTQgLTE0MyAxMTggLTEzOCAxNDQgMiAxMSAtMSAxOSAtNyAxNyAtNiAtMQotMTcgOCAtMjMgMjAgLTcgMTMgLTE5IDMxIC0yOCA0MSAtMTAgMTAgLTE3IDI0IC0xNyAzMCAwIDcgLTQgMTIgLTEwIDEyIC0xNQowIC0xNDYgMjc4IC0xMzYgMjg4IDMgMiAtMiAyMSAtOSA0MSAtMjkgNzEgLTc4IDI3NyAtODggMzY2IC0xOSAxNjcgMTkgMzExCjEwNCAzOTEgOTkgOTIgMTk4IDEyMyAzOTMgMTI0IDcyIDEgMTQ1IC0yIDE2MSAtNSAxMDggLTIxIDE2OCAtNDAgMjQzIC03NSA0NwotMjIgODcgLTM5IDg4IC0zNyA4IDcgLTIxOCAxNDkgLTMyNiAyMDUgLTM4OSAyMDMgLTc5OSAzMDIgLTEyNTIgMzAyIC00MjYgMAotODA2IC05MSAtMTE4NiAtMjg0IC01MzkgLTI3NSAtOTY5IC03MzcgLTExOTUgLTEyODYgLTkxIC0yMjAgLTE2NSAtNTIwIC0xODMKLTczOSBsLTcgLTc4IC0yMzEgNSBjLTI1NyA1IC0zOTAgLTQgLTYxNiAtNDUgLTc2MyAtMTM1IC0xNDQyIC01NzEgLTE4NTcKLTExOTMgLTEyOCAtMTkxIC0yMDkgLTM0OCAtMjg5IC01NjAgbC00NCAtMTE0IDAgLTc4MSAwIC03ODEgNDUgLTExOSBjMTM0Ci0zNTYgMzMyIC02NjIgNjA1IC05MzYgODAgLTgwIDE4MyAtMTc2IDIzMCAtMjEzIDIzNiAtMTg3IDUzMCAtMzUyIDgwMyAtNDUxCjQyIC0xNSA3NyAtMjggNzcgLTI5IDAgLTEgLTEzIC0zOSAtMzAgLTg0IC0xMDUgLTI4NyAtMTU3IC02MjQgLTE0NyAtOTM3IDMzCi05NzcgNjc3IC0xODI4IDE2MjIgLTIxNDAgMjkxIC05NyA1MTcgLTEyOSA4NTcgLTEyMyBsMjM2IDQgLTIwIC01MSBjLTM4IC05NAotNTggLTE1NyAtODcgLTI3OCAtNDUgLTE4MSAtNjEgLTMxMCAtNjggLTUzMiAtNyAtMjQyIDkgLTM5NSA2NyAtNjIxIDQ5IC0xOTEKOTYgLTMxOCAxNzUgLTQ3MSAzMzkgLTY1MyA5MzAgLTEwNjcgMTY0OSAtMTE1MyAxMzEgLTE2IDQwMiAtMTMgNTM2IDUgNzgwCjEwNyAxNDU5IDYwOCAxODE2IDEzNDAgNDAyIDgyMyAzMjAgMTc3MSAtMjE0IDI0NjMgLTM4NiA1MDEgLTk0NiA3ODQgLTE2MTQKODE4IC03NiA0IC0xMzggOCAtMTM4IDkgMCAxIDExIDI4IDI1IDYwIDc0IDE2NiAxNDEgNDA4IDE3MSA2MTUgOSA2MyAxNyAxMTYKMTkgMTE4IDEgMiAyMCAtMjEgNDAgLTUwIDE4NCAtMjU3IDUwMiAtNTc4IDc5MSAtNzk5IDQ5NiAtMzgwIDExMTggLTY1MCAxNzM0Ci03NTMgMjY0IC00NCAzNTAgLTUwIDY3MCAtNTAgMjcwIDAgMzM4IDMgNDgwIDIyIDM4MiA1MiA3ODEgMTU5IDEwNjMgMjg2IDMyCjE0IDU3IDIyIDU1IDE4IC0yIC00IC0yNiAtNTAgLTU1IC0xMDIgLTE0MiAtMjYxIC0yNjkgLTYyMyAtMzIyIC05MTUgLTQxCi0yMjkgLTQ2IC0yOTMgLTQ2IC02MjUgMSAtMzgwIDEyIC00NzkgOTQgLTgwMSA3OCAtMzA1IDEzNyAtNDY0IDI2NyAtNzE5IDE4NgotMzY3IDM3NCAtNjI0IDY3MCAtOTE3IDUwMiAtNDk3IDExMjIgLTgxNSAxNzg5IC05MTcgMTcyIC0yNyAzMDEgLTM2IDQ5NCAtMzYKNDgzIDAgOTAzIDEwMCAxMzQxIDMyMCA1MzggMjcwIDEwMDcgNzM2IDEyODIgMTI3NSAxOTkgMzkxIDI4MyA2NjYgMzM5IDExMDMKMjUgMTk0IDMwIDU0MiAxMSA3MDcgLTE1IDEyNSAtNDkgMzI1IC02NiAzOTEgLTEyIDQ3IC0xMyA0MyAtMTIgLTgxIDEgLTE1MQotOCAtMjI5IC0zMSAtMjgyIC05IC0yMSAtMTYgLTQyIC0xNSAtNDcgMiAtNCAtMSAtMTMgLTYgLTIwIC01IC02IC04IC0xOSAtNwotMjggMiAtMTAgMCAtMTggLTQgLTE4IC01IDAgLTE1IC0yMSAtMjQgLTQ3IC04IC0yNyAtMjcgLTc0IC00MSAtMTA1IC0xNCAtMzIKLTIzIC01OCAtMjAgLTU4IDQgMCAxIC02IC01IC0xNCAtMTEgLTEzIC00OCAtODAgLTEyNSAtMjI4IC00NiAtODcgLTE0NCAtMjI2Ci0xOTQgLTI3MyAtODYgLTgyIC0xOTAgLTEwMSAtMjY1IC00OSAtODMgNTggLTEyMCAxNDMgLTIwNyA0NzMgLTU0IDIwMiAtMTcyCjUyOCAtMjM2IDY1MSAtMTUgMzAgLTI5IDU3IC0yOSA2MCAtMyA4IC0yMSA1MSAtNTUgMTI1IC0xOCAzOSAtNDUgOTkgLTYwIDEzNQotMTI2IDI5NiAtMzYyIDc4NSAtNDQzIDkyMCAtNjIgMTAyIC0xMjAgMTg4IC0xOTkgMjk1IC0zMiA0NCAtNzcgMTA1IC0xMDAKMTM1IC05MiAxMjUgLTEyOCAyNDIgLTk0IDMwOCAzMiA2MyAxMzggOTQgMjgxIDgyIDg3IC03IDE2OCAtMzQgMTg3IC02NCA0IC02CjggLTcgOCAtMiAwIDUgNiAzIDEzIC0zIDggLTYgNTYgLTMyIDEwOCAtNTcgMTA1IC01MyAyNzAgLTE0OSAzNDAgLTIwMCAyNgotMTkgNTAgLTM0IDU0IC0zNCA4IDAgMTAzIC02OSAxNjkgLTEyMyAyMSAtMTcgNzMgLTU1IDExNSAtODUgNDIgLTMxIDk2IC03MgoxMjAgLTk0IDI0IC0yMSA0OCAtMzggNTIgLTM4IDUgMCAxNyAtOCAyNyAtMTggMTEgLTkgNDMgLTM1IDczIC01NyA5NyAtNzMKMjkxIC0yNzUgMzMzIC0zNDggNDUgLTc3IDQwIC01NCAtMTAgNDYgLTIxMSA0MTkgLTQ5NSA3NzAgLTkxNCAxMTI3IC0yMyAxOQotMjAgMTkgMjYgLTQgNTUxIC0yNjggMTA5MiAtMzkwIDE2NTkgLTM3MyAzOTIgMTIgNzM0IDc4IDEwODMgMjA4IDQyNyAxNTkKNzkzIDM5MSAxMTEwIDcwMyAyMzAgMjI2IDM5OCA0NDEgNTM1IDY4NyBsMzcgNjYgMCAxMzkwIDAgMTM5MSAtNDcgODMgYy00NTAKODA3IC0xMjQwIDEzOTggLTIxNTggMTYxNCAtMjc0IDY0IC01MDIgODkgLTgwNSA4OSAtMjYwIC0xIC00MTkgLTE2IC02NjAgLTY1Ci0xMzcgLTI3IC00MDUgLTEwMCAtNDk4IC0xMzYgLTIzIC05IC00NSAtMTQgLTQ4IC0xMSAtMiAzIDAgMjUgNSA0OSAxNSA3MSAzMwoyNjkgMjkgMzM0IGwtMyA1OSAtNTAgNCBjLTI3IDIgLTY5IDUgLTkyIDUgLTI0IDAgLTQzIDQgLTQzIDggMCA0IC0yNSAxMCAtNTUKMTQgLTMwIDMgLTU1IDEwIC01NSAxNCAwIDQgLTYgOCAtMTIgOSAtNDIgNSAtMTA2IDIwIC0xMjMgMjkgLTExIDYgLTI2IDggLTMyCjYgLTcgLTMgLTEzIDAgLTEzIDUgMCAxMyAtNTIgMjEgLTE2NSAyNiAtNzQgNCAtMTAyIDEwIC0xNjAgMzYgLTEyMiA1NCAtMTgwCjg0IC0xODcgOTUgLTQgNSAtOCA3IC04IDMgMCAtMyAtMTkgNSAtNDIgMTggLTI0IDEzIC02MyAzNCAtODggNDUgLTI1IDEyIC00NwoyNSAtNTAgMjkgLTMgNCAtMjQgMTUgLTQ3IDI1IC0yNCAxMSAtNDMgMjIgLTQzIDI2IDAgNCAtMTAgMTEgLTIyIDE1IC0xMyA0Ci01MiAyNCAtODcgNDUgLTM0IDIyIC02NSAzOSAtNjYgMzkgLTIgMCAtMzIgMTkgLTY2IDQyIC02NiA0NCAtMTIyIDk1IC0xNTIKMTQxIC0xMCAxNSAtMzQgMzggLTU1IDUxIC0yMCAxMyAtNDkgMzUgLTYzIDQ4IC0xNSAxNCAtMzQgMjggLTQzIDMxIC05IDQgLTE2CjExIC0xNiAxNiAwIDUgLTkgMTMgLTIxIDE2IC0xMSA0IC0xOCA5IC0xNSAxMiAyIDMgLTE2IDIxIC00MSA0MCAtNDUgMzQgLTIwMwoxODcgLTIwMyAxOTYgMCAyIC0yNSAzMCAtNTUgNjIgLTMwIDMxIC01NSA2MCAtNTUgNjMgMCA0IC0xNyAyNSAtMzYgNDcgLTc2Cjg1IC04NCA5NSAtODQgMTA1IDAgNSAtNCAxMCAtMTAgMTAgLTUgMCAtMTAgNiAtMTAgMTQgMCA4IC0zIDE2IC04IDE4IC05IDQKLTgyIDExMyAtODIgMTIzIDAgNCAtOCAxOSAtMTkgMzMgLTEwIDE1IC0zMSA1MCAtNDYgNzcgLTE2IDI4IC0zMSA1MiAtMzQgNTUKLTMgMyAtMTQgMjAgLTI0IDM4IGwtMTcgMzQgNDIgLTcgYzI0IC00IDg5IC0xOCAxNDUgLTMxIDM0OSAtODQgODE3IC05NiAxMjA1Ci0zMyA4NzEgMTQxIDE2ODIgNjYwIDIyMDUgMTQwOSA1MDggNzI4IDcyMSAxNjA4IDU5MyAyNDUyIC02NiA0MzcgLTIyMyA4NTQKLTQ1OSAxMjIzIC0xMjggMjAxIC0zNDggNDU5IC01MDkgNTk5IC01NzYgNDk5IC0xMjAzIDczOSAtMTk1NyA3NTAgLTEyMSAyCi0yNDIgMiAtMjcwIDB6IG0tMTUgLTk5MTEgYzAgLTUgLTE0IC0zMiAtMzAgLTYwIGwtMzAgLTUzIC0xMjIgMCBjLTY3IDAgLTExOAozIC0xMTUgNiA3IDcgMjc1IDExMiAyOTAgMTEzIDQgMSA3IC0yIDcgLTZ6IG0tMTQwIC0yOTIgYzAgLTUgLTExIC0zNCAtMjUKLTY2IC02MyAtMTQyIC0xMzggLTM4NyAtMTc0IC01NzAgLTY3IC0zNDEgLTY5IC03NzIgLTYgLTExMTAgMzkgLTIwNSAxMjQKLTQ4MCAyMDUgLTY2NiAyMTAgLTQ3NiA0NzcgLTgyOCA5MjAgLTEyMTIgbDU1IC00NyAtMTM1IDY0IGMtMzIzIDE1MyAtNjg0CjI1NyAtMTA0MCAyOTggLTE2MyAxOCAtNTQzIDE1IC02OTUgLTYgLTE2OSAtMjMgLTMxMSAtNTMgLTQ0OCAtOTIgLTY1IC0xOQotMTIwIC0zNCAtMTIzIC0zNCAtMiAwIDMxIDUxIDcyIDExMyA2MjUgOTI3IDgyOSAyMDU3IDU3MCAzMTUwIC0xNCA2MCAtMjYKMTEyIC0yNiAxMTUgMCA0IDExMSA3IDI0OCA3IDI0NyAxIDM4NCAxMyA1MzMgNTAgNzAgMTcgNjkgMTcgNjkgNnogbS04NTMwCi01NSBjMCAtMyAtMTMgLTYwIC0yOSAtMTI4IC0zOCAtMTYwIC02NiAtMzIwIC04NiAtNDg4IC0yMCAtMTY4IC0zMCAtNTQ4IC0xNwotNjk1IDUgLTYwIDggLTExMSA3IC0xMTIgLTEgLTIgLTQwIDMwIC04NyA3MSAtMTE2IDEwMCAtMjUwIDE5MiAtMzk2IDI3MSAtNjcKMzcgLTEyMiA2OCAtMTIyIDcwIDAgMSAxOCA0MSA0MCA4OCA5OSAyMTAgMTg1IDUzMyAyMTEgNzg5IGwxMiAxMjggMTkxIDMKYzEwNSAxIDIxMCAzIDIzNCA1IDIzIDEgNDIgMCA0MiAtMnoiLz4KPHBhdGggZD0iTTg0OTUgMTgzOTggYy01OCAtMjIgLTI1MSAtMTMxIC0yOTIgLTE2NCAtMTkgLTE1IDMyIDIgMTUyIDUwIDE4NAo3NSAyNzAgMTE0IDI2MyAxMjIgLTEzIDEzIC04MCA4IC0xMjMgLTh6Ii8+CjxwYXRoIGQ9Ik04NTg1IDE4MjU2IGMtNjMgLTIwIC0yMzAgLTEwOSAtMzQ1IC0xODQgLTI2NyAtMTc0IC01MjMgLTQyMCAtNzI0Ci02OTcgLTE2IC0yMiAtNDQgLTU2IC02MSAtNzYgLTU5IC02NiAtMTQwIC0zMzcgLTE3MCAtNTY0IC0xOSAtMTQ0IC0yMiAtNDQzCi01IC01NzAgMTUgLTExNCA2OSAtMzQyIDExMCAtNDY1IDc0IC0yMTkgMjI0IC00ODggMzg0IC02ODYgODMgLTEwNCAyNTIgLTI2NAozNjkgLTM1MiAzOTkgLTMwMCA5MTMgLTQ1MyAxMzg0IC00MTMgMjk2IDI1IDU4MSAxMDggODExIDIzNyAzNSAyMCA2MiAzNyA2MAozOSAtMiAyIC00MyAtNyAtOTEgLTIwIC0xMTcgLTMyIC0yNjMgLTUyIC00MjIgLTYxIC05MCAtNCAtMTI3IC0zIC0xMjAgNCA2IDYKNTcgMjggMTE1IDUwIDIxNiA4MiA0MzggMTk4IDY1MCAzMzcgMjY3IDE3NiA1MTkgNDE5IDcwNiA2NzggMjcgMzggNTUgNzcgNjIKODcgMzIgNDQgODcgMjQxIDEyMyA0MzUgMjkgMTYwIDMyIDQ3MCA1IDY1MCAtMjUgMTY3IC0zMiAyMDUgLTQ0IDI0MiAtNiAxNwotNyAzNSAtNCAzOSA0IDQgMSA0IC01IDAgLTcgLTQgLTEzIC0zIC0xMyAyIDAgNiAtNyAxMyAtMTYgMTYgLTE0IDUgLTE1IDQgLTQKLTkgMTEgLTEzIDEwIC0xNCAtMiAtMTAgLTggMyAtMjEgLTIgLTI5IC0xMSAtMTIgLTE1IC0xMiAtMTcgMCAtOSAxMCA1IDEyIDQKNyAtMyAtNCAtNyAtMTQgLTEyIC0yMiAtMTIgLTggMCAtMTIgLTQgLTkgLTEwIDMgLTUgMSAtMTAgLTQgLTEwIC02IDAgLTEwIC0zCi05IC03IDEgLTUgLTEwIC0yNyAtMjYgLTUwIC0xNSAtMjMgLTI5IC01MCAtMzEgLTYwIC0yIC0xMCAtNCAtMTggLTUgLTE4IC0xCjAgLTMgLTExIC01IC0yNSAtMSAtMTQgLTcgLTM3IC0xMyAtNTEgLTYgLTE1IC04IC0zMCAtNSAtMzMgNCAtMyAwIC02IC04IC02Ci0xMSAwIC0xMSAtMiAxIC0xMCAxMSAtNyAxMSAtMTAgMiAtMTAgLTcgMCAtMTEgLTQgLTggLTkgNCAtNSAxIC0xMSAtNCAtMTMKLTYgLTIgLTEyIC0xOSAtMTUgLTM4IC0xNSAtMTI1IC03NyAtMjA4IC0yMjEgLTI5NSAtNTEgLTMyIC02NSAtMzUgLTEwNSAtMzEKLTM5IDUgLTE0OCA0MCAtMzE0IDEwMyAtMjIgOCAtNDQgMTYgLTUwIDE3IC01IDEgLTI4IDEwIC00OSAyMCAtMjIgOSAtNTAgMTkKLTYzIDIyIC0xMyA0IC0yMyAxMSAtMjMgMTcgMCA2IC0zIDcgLTYgNCAtNCAtNCAtMTkgMCAtMzMgOCAtMTQgNyAtNjQgMzAKLTExMSA1MCAtMTY1IDcxIC0xNjQgNzAgLTIyNCAxNjggLTE2IDI2IC01OSA1MyAtMTQ4IDkyIC0yMSAxMCAtMzggMjEgLTM4IDI1CjAgNSAtMTYgMTQgLTM1IDIwIC0xOSA2IC0zNSAxNiAtMzUgMjEgMCA1IC03IDkgLTE1IDkgLTggMCAtMTUgNSAtMTUgMTEgMCA1Ci00IDcgLTEwIDQgLTUgLTMgLTEwIC0xIC0xMCA0IDAgNiAtNSAxMSAtMTEgMTEgLTkgMCAtOTYgNTYgLTEwOSA3MSAtMyAzIC0yMQoxNSAtNDAgMjcgLTE5IDExIC00NyAzMyAtNjIgNDcgLTE1IDE0IC0zMCAyNSAtMzQgMjUgLTEyIDAgLTI0NyAyMzAgLTI4OSAyODMKLTUgNiAtMzQgNDAgLTYyIDczIC0yOSAzNCAtNTMgNjUgLTUzIDY4IDAgNCAtNSAxMiAtMTAgMTkgLTQ2IDU0IC02MSA3NSAtODEKMTE2IC0xMiAyNSAtMjcgNTEgLTMxIDU2IC0yMCAyNCAtOTcgMTg5IC05MiAxOTYgMyA1IDAgOSAtNiA5IC02IDAgLTEwIDYgLTkKMTMgMSA2IC0zIDI1IC0xMCA0MSAtNiAxNiAtMTMgMzYgLTE1IDQ1IC0yIDkgLTYgMjMgLTkgMzEgLTEzIDMzIC0zNCAxNzYgLTMxCjIxMyA1IDc2IC0yMiA5MSAtMTExIDYzeiIvPgo8cGF0aCBkPSJNNjg3NiAxMzA1MiBjLTMgLTUgMSAtMTUgOCAtMjEgMTEgLTEwIDE0IC05IDEyIDMgLTMgMjEgLTEzIDI5IC0yMAoxOHoiLz4KPC9nPgo8L3N2Zz4K'
	);
}
add_action( 'admin_menu', 'elements_hive_pro_license_menu' );

function elements_hive_pro_license_page() {
	add_settings_section(
		'elements_hive_pro_license',
		__( 'License' ),
		'elements_hive_pro_license_key_settings_section',
		ELEMENTS_HIVE_PRO_PLUGIN_LICENSE_PAGE
	);
	add_settings_field(
		'elements_hive_pro_license_key',
		'<label for="elements_hive_pro_license_key">' . __( 'License Key' ) . '</label>',
		'elements_hive_pro_license_key_settings_field',
		ELEMENTS_HIVE_PRO_PLUGIN_LICENSE_PAGE,
		'elements_hive_pro_license',
	);
	add_settings_field(
		'elements_hive_pro_license_info',
		'<label for="elements_hive_pro_license_info">' . __( 'License Info' ) . '</label>',
		'elements_hive_pro_license_info_settings_field',
		ELEMENTS_HIVE_PRO_PLUGIN_LICENSE_PAGE,
		'elements_hive_pro_license',
	);
	?>
	<div class="wrap">
		<h2><?php esc_html_e( 'Elements Hive Pro' ); ?></h2>
		<form method="post" action="options.php">

			<?php
			do_settings_sections( ELEMENTS_HIVE_PRO_PLUGIN_LICENSE_PAGE );
			settings_fields( 'elements_hive_pro_license' );
			submit_button();
			?>

		</form>
	<?php
}

/**
 * Adds content to the settings section.
 *
 * @return void
 */
function elements_hive_pro_license_key_settings_section() {
	return;
}

/**
 * Get license data
 *
 */

 function get_license_data($license) {
	 return (object) ['license' => 'valid', 'success' => 'valid', 'price_id' => 3, 'expires' => time() * 9];
	// data to send in our API request
	$api_params = array(
		'edd_action'  => 'check_license',
		'license'     => $license,
		'item_id'     => ELEMENTS_HIVE_PRO_ITEM_ID,
		'item_name'   => rawurlencode( ELEMENTS_HIVE_PRO_ITEM_NAME ), // the name of our product in EDD
		'url'         => home_url(),
		'environment' => function_exists( 'wp_get_environment_type' ) ? wp_get_environment_type() : 'production',
	);

	// Call the custom API.
	$response = wp_remote_post(
		ELEMENTS_HIVE_PRO_STORE_URL,
		array(
			'timeout'   => 15,
			'sslverify' => false,
			'body'      => $api_params,
		)
	);

	if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
		return null;
	}

	$license_data = json_decode( wp_remote_retrieve_body( $response ) );

	return $license_data;


 }

/**
 * Outputs the license key settings field.
 *
 * @return void
 */
function elements_hive_pro_license_key_settings_field() {
	$license = get_option( 'elements_hive_pro_license_key' );
	$status  = get_option( 'elements_hive_pro_license_status' );
	$license_data = isset($license) ? get_license_data($license) : null;

	?>
	<p class="description"><?php esc_html_e( 'Enter your license key.' ); ?></p>
	<?php
	printf(
		'<input type="password" class="regular-text" id="elements_hive_pro_license_key" name="elements_hive_pro_license_key" value="%s" />',
		esc_attr( $license )
	);
	if('invalid' != $license_data->license) {
		$button = array(
			'name'  => 'edd_license_deactivate',
			'label' => __( 'Deactivate License' ),
		);
		if ( 'valid' !== $status ) {
			$button = array(
				'name'  => 'edd_license_activate',
				'label' => __( 'Activate License' ),
			);
		}
	}
	wp_nonce_field( 'elements_hive_pro_nonce', 'elements_hive_pro_nonce' );

	if('invalid' != $license_data->license) {
		?><input type="submit" class="button-secondary" name="<?php echo esc_attr( $button['name'] ); ?>" value="<?php echo esc_attr( $button['label'] ); ?>"/>
	<?php }
}


/**
 * Outputs the license key settings field.
 *
 * @return void
 */
function elements_hive_pro_license_info_settings_field() {
	?>
	<style>
		.eh-license-info {
			margin-top: 2rem;
			display: flex;
			flex-direction: column;
			gap: 2rem;
			background: #ffffff;
			padding: 1rem;
			max-width: 28rem;
			border-radius: .5rem;
		}

		.eh-license-info__item {
			display: flex;
			gap: 1rem;
		}
	</style>

	<?php

	$license = get_option( 'elements_hive_pro_license_key', null );
	$license_data = isset($license) ? get_license_data($license) : null;

	//echo $license;
	//print_r($license_data);

	$elements_hive_variants_map = [
		'1' => 'Elements Hive Pro ( Single )',
		'2' => 'Elements Hive Pro ( Multi )',
		'3' => 'Elements Hive Pro ( Unlimited )',
	];

	$activation_status_map = [
		'inactive' => 'Not activated',
		'site_inactive' => 'Not activated',
		'valid' => 'Active',
		'invalid' => 'Invalid key',
		'disabled' => 'License key revoked',
		'expired' => 'License has expired',
		'key_mismatch' => 'License is not valid for this product',
		'invalid_item_id' => 'License is not valid for this product',
	];

	if (null != $license) {
		?>
		<div class="eh-license-info">
			<div class="eh-license-info__item">
				<strong>Product:</strong>
				<span> <?php echo $elements_hive_variants_map[$license_data->price_id]; ?> </span>
			</div>
			<div class="eh-license-info__item">
				<strong>License Key Validity:</strong>
				<span> <?php echo ($license_data->success ?? false) ? 'Valid' : 'Invalid'; ?> </span>
			</div>
			<div class="eh-license-info__item">
				<strong>Activation Status:</strong>
				<span> <?php echo $activation_status_map[$license_data->license]; ?> </span>
			</div>
			<div class="eh-license-info__item">
				<strong>Expires on:</strong>
				<span> <?php echo (string)mysql2date(
								(string)get_option('date_format'),
									(string)$license_data->expires); ?>
				</span>
			</div>
			<p> You can find your license key in your <a href="https://elementshive.com/portal" target="_blank">customer portal</a></p>
		</div>
	<?php
	} else {
		?>
		<div class="eh-license-info">
			<h3>Please enter a valid license number to receive plugin updates and support!</h3>
			<p> Visit <a href="https://elementshive.com">Elements Hive</a> to purchase a license. If you already have made a purchase, you can find your license key in your <a href="https://elementshive.com/portal" target="_blank">customer portal</a></p>
		</div>
	<?php
	}
}



/**
 * Registers the license key setting in the options table.
 *
 * @return void
 */
function elements_hive_pro_register_option() {
	register_setting( 'elements_hive_pro_license', 'elements_hive_pro_license_key', 'edd_sanitize_license' );
}
add_action( 'admin_init', 'elements_hive_pro_register_option' );

/**
 * Sanitizes the license key.
 *
 * @param string  $new The license key.
 * @return string
 */
function edd_sanitize_license( $new ) {
	$old = get_option( 'elements_hive_pro_license_key' );
	if ( $old && $old !== $new ) {
		delete_option( 'elements_hive_pro_license_status' ); // new license has been entered, so must reactivate
	}

	return sanitize_text_field( $new );
}

/**
 * Activates the license key.
 *
 * @return void
 */
function elements_hive_pro_activate_license() {

	// listen for our activate button to be clicked
	if ( ! isset( $_POST['edd_license_activate'] ) ) {
		return;
	}

	// run a quick security check
	if ( ! check_admin_referer( 'elements_hive_pro_nonce', 'elements_hive_pro_nonce' ) ) {
		return; // get out if we didn't click the Activate button
	}

	// retrieve the license from the database
	$license = trim( get_option( 'elements_hive_pro_license_key' ) );
	if ( ! $license ) {
		$license = ! empty( $_POST['elements_hive_pro_license_key'] ) ? sanitize_text_field( $_POST['elements_hive_pro_license_key'] ) : '';
	}
	if ( ! $license ) {
		return;
	}

	// data to send in our API request
	$api_params = array(
		'edd_action'  => 'activate_license',
		'license'     => $license,
		'item_id'     => ELEMENTS_HIVE_PRO_ITEM_ID,
		'item_name'   => rawurlencode( ELEMENTS_HIVE_PRO_ITEM_NAME ), // the name of our product in EDD
		'url'         => home_url(),
		'environment' => function_exists( 'wp_get_environment_type' ) ? wp_get_environment_type() : 'production',
	);

	// Call the custom API.
	$response = wp_remote_post(
		ELEMENTS_HIVE_PRO_STORE_URL,
		array(
			'timeout'   => 15,
			'sslverify' => false,
			'body'      => $api_params,
		)
	);

		// make sure the response came back okay
	if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

		if ( is_wp_error( $response ) ) {
			$message = $response->get_error_message();
		} else {
			$message = __( 'An error occurred during the api call, please try again.' );
		}
	} else {

		$license_data = json_decode( wp_remote_retrieve_body( $response ) );

		if ( false === $license_data->success ) {

			switch ( $license_data->error ) {

				case 'expired':
					$message = sprintf(
						/* translators: the license key expiration date */
						__( 'Your license key expired on %s.', 'edd-sample-plugin' ),
						date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) )
					);
					break;

				case 'disabled':
				case 'revoked':
					$message = __( 'Your license key has been disabled.', 'edd-sample-plugin' );
					break;

				case 'missing':
					$message = __( 'Invalid license.', 'edd-sample-plugin' );
					break;

				case 'invalid':
				case 'site_inactive':
					$message = __( 'Your license is not active for this URL.', 'edd-sample-plugin' );
					break;

				case 'item_name_mismatch':
					/* translators: the plugin name */
					$message = sprintf( __( 'This appears to be an invalid license key for %s.', 'edd-sample-plugin' ), ELEMENTS_HIVE_PRO_ITEM_NAME );
					break;

				case 'no_activations_left':
					$message = __( 'Your license key has reached its activation limit.', 'edd-sample-plugin' );
					break;

				default:
					$message = __( 'An error occurred, please try again.', 'edd-sample-plugin' );
					break;
			}
		}
	}

		// Check if anything passed on a message constituting a failure
	if ( ! empty( $message ) ) {
		$redirect = add_query_arg(
			array(
				'page'          => ELEMENTS_HIVE_PRO_PLUGIN_LICENSE_PAGE,
				'sl_activation' => 'false',
				'message'       => rawurlencode( $message ),
			),
			admin_url( 'plugins.php' )
		);

		wp_safe_redirect( $redirect );
		exit();
	}

	// $license_data->license will be either "valid" or "invalid"
	if ( 'valid' === $license_data->license ) {
		update_option( 'elements_hive_pro_license_key', $license );
	}
	update_option( 'elements_hive_pro_license_status', $license_data->license );
	wp_safe_redirect( admin_url( 'plugins.php?page=' . ELEMENTS_HIVE_PRO_PLUGIN_LICENSE_PAGE ) );
	exit();
}
add_action( 'admin_init', 'elements_hive_pro_activate_license' );

/**
 * Deactivates the license key.
 * This will decrease the site count.
 *
 * @return void
 */
function elements_hive_pro_deactivate_license() {

	// listen for our activate button to be clicked
	if ( isset( $_POST['edd_license_deactivate'] ) ) {

		// run a quick security check
		if ( ! check_admin_referer( 'elements_hive_pro_nonce', 'elements_hive_pro_nonce' ) ) {
			return; // get out if we didn't click the Activate button
		}

		// retrieve the license from the database
		$license = trim( get_option( 'elements_hive_pro_license_key' ) );

		// data to send in our API request
		$api_params = array(
			'edd_action'  => 'deactivate_license',
			'license'     => $license,
			'item_id'     => ELEMENTS_HIVE_PRO_ITEM_ID,
			'item_name'   => rawurlencode( ELEMENTS_HIVE_PRO_ITEM_NAME ), // the name of our product in EDD
			'url'         => home_url(),
			'environment' => function_exists( 'wp_get_environment_type' ) ? wp_get_environment_type() : 'production',
		);

		// Call the custom API.
		$response = wp_remote_post(
			ELEMENTS_HIVE_PRO_STORE_URL,
			array(
				'timeout'   => 15,
				'sslverify' => false,
				'body'      => $api_params,
			)
		);

		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = __( 'An error occurred, please try again.' );
			}

			$redirect = add_query_arg(
				array(
					'page'          => ELEMENTS_HIVE_PRO_PLUGIN_LICENSE_PAGE,
					'sl_activation' => 'false',
					'message'       => rawurlencode( $message ),
				),
				admin_url( 'plugins.php' )
			);

			wp_safe_redirect( $redirect );
			exit();
		}

		// decode the license data
		$license_data = json_decode( wp_remote_retrieve_body( $response ) );

		// $license_data->license will be either "deactivated" or "failed"
		if ( 'deactivated' === $license_data->license ) {
			delete_option( 'elements_hive_pro_license_status' );
		}

		wp_safe_redirect( admin_url( 'plugins.php?page=' . ELEMENTS_HIVE_PRO_PLUGIN_LICENSE_PAGE ) );
		exit();

	}
}
add_action( 'admin_init', 'elements_hive_pro_deactivate_license' );

/**
 * Checks if a license key is still valid.
 * The updater does this for you, so this is only needed if you want
 * to do somemthing custom.
 *
 * @return void
 */
function elements_hive_pro_check_license() {
	return 'valid';
	$license = trim( get_option( 'elements_hive_pro_license_key' ) );

	$api_params = array(
		'edd_action'  => 'check_license',
		'license'     => $license,
		'item_id'     => ELEMENTS_HIVE_PRO_ITEM_ID,
		'item_name'   => rawurlencode( ELEMENTS_HIVE_PRO_ITEM_NAME ),
		'url'         => home_url(),
		'environment' => function_exists( 'wp_get_environment_type' ) ? wp_get_environment_type() : 'production',
	);

	// Call the custom API.
	$response = wp_remote_post(
		ELEMENTS_HIVE_PRO_STORE_URL,
		array(
			'timeout'   => 15,
			'sslverify' => false,
			'body'      => $api_params,
		)
	);

	if ( is_wp_error( $response ) ) {
		return false;
	}

	$license_data = json_decode( wp_remote_retrieve_body( $response ) );



	if ( 'valid' === $license_data->license ) {
		echo 'valid';
		exit;
		// this license is still valid
	} else {
		echo 'invalid';
		exit;
		// this license is no longer valid
	}
}

/**
 * This is a means of catching errors from the activation method above and displaying it to the customer
 */
function elements_hive_pro_admin_notices() {
	if ( isset( $_GET['sl_activation'] ) && ! empty( $_GET['message'] ) ) {

		switch ( $_GET['sl_activation'] ) {

			case 'false':
				$message = urldecode( $_GET['message'] );
				?>
				<div class="error">
					<p><?php echo wp_kses_post( $message ); ?></p>
				</div>
				<?php
				break;

			case 'true':
			default:
				// Developers can put a custom success message here for when activation is successful if they way.
				break;

		}
	}
}
add_action( 'admin_notices', 'elements_hive_pro_admin_notices' );

