<template>
    <!-- htmlのテンプレート部分 -->
    <div class="myshowtime">
       <h1
           class="showtime"
           v-on:mouseenter="showTime()"
           v-on:mouseleave="now = ''"
       >
           現在時刻
       </h1>
       <p class="showtime_p">{{ now }}</p>
    </div>
</template>

<!-- css部分 -->
 <style>
     .showtime {
         background-color: cyan;
         width: 300px;
         text-align: center;
     }
     .showtime_p {
         color: green;
         font-size: 2em;
     }
 </style>

<script>
  //Laravelで組み込む際はnew Vueは記載なし。（resource/js/app.jsにて記載）
  //その代わりexport defaultの記載は必要。
  //また、resource/js/app.jsでの追記を忘れず！
  export default{
    //dataオブジェクト（関数としてreturnしないといけない（？））
    data:function(){
      return{
        now: 'てすと'
      };
    },
    //methods部分はそのまま
      methods: {
        showTime: function(){
            // now = new Date();
            // this.now = now.getHours() + "時" + now.getMinutes() + "分"
            this.now = "ホバーしております。"
      }
    }
  }
</script>
