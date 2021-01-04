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