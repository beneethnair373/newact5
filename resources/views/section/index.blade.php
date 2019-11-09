<html>
   <body>
     <div id='app'>
     	Select Section:
     	<select v-on:change='fetchStudents()' v-model='selected_section'>
             @foreach($sections as $section)
             <option value="{{$section->id}}">
             	{{$section->name}}
             </option>
             @endforeach
     	</select>
     	Students:
    
             
      <p>Unpaid Students</p>
         <ul>
             
                <li v-for='student in Unpaid'>
                    @{{ students.body }}
                </li>
         </ul>

      <p>Paid Students</p>
         <ul>
             <li v-for='student in Paid'>
                   @{{ students.body }}
             </li>
         </ul>
</div>
 </body>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

     <script type="text/javascript">
     	
   var vm = new Vue({
            el: '#app',
            data: {
                selected_section: '',
                students: []
            },
            methods: {
                fetchStudents() {
                    //use axios to get questions based on their category
                    axios.get('/students?section_id='+this.selected_section)
                        .then(function(response) {
                            console.log(response.data);
                            //assign the data to the questions array in the data attribute of vm
                            vm.students = response.data;
                        });
                }
            },
            // computed: {
            //     Unpaid() {
            //         //return filtered questions
            //         return this.payments.filter(function(question) {
            //             //return only the questions wherein the is_multiple_choice is equal to 1
            //             return payments.is_Unpaid == 1;
            //         });
            //     },
            //     Paid() {
            //         //return filtered questions
            //         return this.payments.filter(function(question) {
            //             //return only the questions wherein the is_multiple_choice is equal to 0
            //             return payments.is_paid == 0;
            //         });
            //     }
            // }
        })

     </script>
</html>