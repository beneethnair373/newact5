<html>
   <body>
     <div id='app'>
     	Select Section:
     	<select>
             @foreach($sections as $section)
             <option value="{{$section->id}}">
             	{{$section->name}}
             </option>
             @endforeach
     	</select>
     	Select Students:
     	<select>
             @foreach($students as $student)
             <option value="{{$student->id}}">
             	{{$student->name}}
             </option>
             @endforeach
     	</select>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
     </div>

     <script type="text/javascript">
     	
  var app = new Vue({
  el: '#app',
  data: {
    users:[]
  },
  mounted(){
     this.loadData();
  },
  methods:{
     loadData:function(){
  axios.get('https://jsonplaceholder.typicode.com/users').then(res=>{
       if(res.status==200){
         this.users=res.data;
       }
     }).catch(err=>{
         console.log(err)
     });
     }
  }
})
     </script>
   </body>
</html>