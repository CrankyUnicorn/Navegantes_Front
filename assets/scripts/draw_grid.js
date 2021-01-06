"use strict";
const draw_grid = (ctx, img) => {
    const initialData = window.__INITIAL_DATA__;
    const canvas_w = initialData.canvas_w;
    const canvas_h = initialData.canvas_h;
    //canvas.width = this.naturalWidth;
    //canvas.height = this.naturalHeight;
    //ctx.drawImage(this, 0, 0);
    let j = 0;
    let i = 0;
    while (j < 4) {
        if (((i + 1) % 7) == 0) {
            i = 0;
            j++;
        }
        ctx.lineWidth = 2;
        ctx.strokeStyle = '#045';
        ctx.strokeRect(1, 1, canvas_w - 2, canvas_h - 2);
        ctx.strokeRect(i * img.width, j * img.height, img.width, img.height);
        ctx.drawImage(img, i * img.width, j * img.height, img.width, img.height);
        i++;
    }
};
