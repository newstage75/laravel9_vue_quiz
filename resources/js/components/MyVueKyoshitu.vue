<template>
  <div class="vuekyoshitu-container">
    <button @click="calcFare(19)">大人料金は？</button>
    <button @click="calcFare(9)">子供料金は？</button>
    <h1 v-show="fare">料金: {{ fare }}円</h1>
  </div>
</template>

<script>
  //Laravelで組み込む際はnew Vueは記載なし。（resource/js/app.jsにて記載）
  //その代わりexport defaultの記載は必要。
  //また、resource/js/app.jsでの追記を忘れず！
  export default{
    //dataオブジェクト（関数としてreturnしないといけない（？））
    data:function(){
      return{
        fare: ''
      };
    },
    //methods部分はそのまま
    methods: {
      calcFare: function(age){
        if　(age<10)　{
          //子供料金
          this.fare = 1000;
        }else{
          //大人料金
          this.fare = 2000;
        }
      }
    }
  }

</script>
