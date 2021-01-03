
  class Theme{
      
    constructor(value){
        this.value = value;
    }

     hexa(){
        let hex='';
        for(let i=1;i<this.value.length;i++)hex+=this.value[i];
        return hex;
    }

     isHexColor(){
        return typeof this.value === 'string'
        && this.value.length === 7
        && this.value[0] == '#'
        && !isNaN(Number('0x' + this.hexa()))
    }
  }

d = document.querySelectorAll('.theme_color');

d.forEach(element => {
    element.addEventListener('keyup', check);
});

function check(){
    document.querySelector('.bck').style="background-color:"+ d[0].value;
    document.querySelector('.thm_text').style="color:"+d[3].value;
    document.querySelectorAll('.box').forEach(element =>element.style="background-color:"+ d[1].value +";");
    document.querySelector('.text_box').style="background-color: transparent;border:1px solid "+d[4].value+"; color:"+d[3].value;
    document.querySelector('.text_box_').style="background-color:"+ d[4].value +";border:1px solid "+d[4].value+"; color:"+d[3].value;

    let col = new Theme(this.value);

    if(!col.isHexColor()) this.classList = "theme_color add_std_inp_sh";
    else this.classList = "theme_color";
}