<html>
   <body>
     <div id='app'>
     	Select Section:
     	<select v-on:change='fetchStudents' v-model='selected_section'>
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
                    @{{ student.first_name }}
                    @{{ student.last_name }}
                </li>
         </ul>
      <p>Paid Students</p>
         <ul>
             <li v-for='student in Paid'>
                   @{{ student.first_name }}
                   @{{ student.last_name }}
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
                    axios.get('/students?section_id='+this.selected_section)
                        .then(function(response) {
                            console.log(response.data);
                            vm.students = response.data;
                        });
                }
            },
            computed: {
                Unpaid() {
                    return this.students.filter(function(student) {
                        return student.id == student.student_id;
                    });
                },
                Paid() {
                    return this.students.filter(function(student) {
                        return student.id !=student.student_id;
                    });
                }
            }
        })
     </script>
</html>