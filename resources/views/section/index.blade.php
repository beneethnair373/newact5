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
                    @{{ students.first_name }},
                    @{{ students.last_name }}
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
            computed: {
                Unpaid() {
                    return this.students.filter(function(question) {
                        return students.id == students.payments;
                    });
                },
                Paid() {
                    return this.students.filter(function(question) {
                        return students.id ==  students.payments;
                    });
                }
            }
        })

     </script>
</html>