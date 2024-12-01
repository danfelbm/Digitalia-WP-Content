class MouseMovement{posPercents(t){return"scroll"===t?{x:(this.pos.x/innerWidth+scrollX/innerWidth)*100,y:(this.pos.y/innerHeight+scrollY/innerHeight)*100}:{x:this.pos.x/innerWidth*100,y:this.pos.y/innerHeight*100}}isWithinTarget(t){return this.pos.x>=t.left&&this.pos.x<=t.right&&this.pos.y>=t.top&&this.pos.y<=t.bottom}posWithinTarget(t,e,o){let i="string"==typeof e?document.querySelector(e):e;if(!i)return{v:-1};let s=i.getBoundingClientRect();return this.isWithinTarget(s)?{v:(this.pos[t]-s["x"===t?"left":"top"])/s["x"===t?"width":"height"],wt:!0}:{v:o,wt:!1}}getScrollbarWidth(){if(-1!==this.scrollbarWidth)return this.scrollbarWidth;let t=document.createElement("div");t.style.overflow="scroll",document.body.appendChild(t);let e=t.offsetWidth-t.clientWidth;return document.body.removeChild(t),this.scrollbarWidth=e+1,e}distance(t){let e="string"==typeof t?document.querySelector(t):t;if(!e)return -1;let o=e.getBoundingClientRect();if(!o||!this.isWithinTarget(o))return -1;let i=o.left+o.width/2,s=o.top+scrollY+o.height/2;return 1-Math.sqrt(Math.pow(this.pos.x-i,2)+Math.pow(this.pos.y+scrollY-s,2))/Math.sqrt(Math.pow(innerWidth/2,2)+Math.pow(innerHeight/2,2))}smoothEnter(t,e,o,i){gsap.ticker.remove(t),e.tweenFromTo(e.time(),e.totalDuration()*o,{onComplete(){gsap.ticker.add(t)},duration:i/1e3,ease:"none"})}smoothLeave(t,e){t.progress<e.progress()?gsap.to(e,t):e.tweenTo(t.progress,t)}constructor(){this.pos={x:0,y:0},this.scrollbarWidth=-1}}void 0===window.MOTIONPAGE_FRONT?setTimeout(()=>{window.MOTIONPAGE_FRONT.mouse=new MouseMovement},150):window.MOTIONPAGE_FRONT.mouse=new MouseMovement,document.body.addEventListener("mousemove",t=>{window.MOTIONPAGE_FRONT.mouse&&(window.MOTIONPAGE_FRONT.mouse.pos={x:t.clientX,y:t.clientY})});