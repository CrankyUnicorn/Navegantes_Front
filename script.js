window.onload = function(){
    document.body.innerHTML = "<p>Navegante</p>" + document.body.innerHTML; 
    document.getElementById("pc_container").innerHTML  += "<p>Bem-vindo aos mar.</p>"; 
    //console.log("help");
    
    var canvas = document.getElementById("pc_canvas");
    var ctx = canvas.getContext('2d');
    
    const tileImg = new Image(100,100);
    tileImg.onload = function(){ drawGrid(tileImg); };
    tileImg.src = 'assets/tiles/sea_tile.png';
    
    ctx.canvas.width = 600;
    ctx.canvas.height = 400;
    
    ctx.drawImage(tileImg, 100, 100, 100, 100);
    
    ctx.fillStyle='#CCFF55';
    //ctx.fillRect(0,0,ctx.canvas.width,ctx.canvas.height);
    //ctx.strokeRect(75, 140, 150, 110);
    
    let lastX = 0;
    let lastY = 0;
    function animation(){
        ctx.lineWidth = 2;
        ctx.strokeStyle = '#CC44FF';
        ctx.beginPath();
        ctx.moveTo(lastX, lastY);
        lastX= rand(600);
        lastY= rand(400);
        ctx.lineTo(lastX, lastY);
        ctx.closePath();
        ctx.stroke();
    }
    
    function drawGrid(img) {
        //canvas.width = this.naturalWidth;
        //canvas.height = this.naturalHeight;

        //ctx.drawImage(this, 0, 0);
        let j = 0;
        let i = 0
        while(j<4){

            if(((i+1)%7) == 0){
                i = 0;
                j++;
            }
            ctx.lineWidth = 2;
            ctx.strokeStyle = '#045';
            ctx.strokeRect(1 , 1 , canvas.width-2 , canvas.height-2 );
            ctx.strokeRect(i*img.width, j*img.height, img.width, img.height);
            ctx.drawImage(img, i*img.width, j*img.height, img.width, img.height);
            
            i++;
        }
    }
    
    function rand(limit){
        return Math.floor(Math.random() * limit);

    }

    //var aniInt = setInterval(animation,400);

}