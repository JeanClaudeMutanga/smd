<template>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Applicants Details</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Date Of Birth</th>
                        <th>Gender</th>
                        <th>Car</th>
                        <th>Colour</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Date Of Birth</th>
                        <th>Gender</th>
                        <th>Car</th>
                        <th>Colour</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <tr v-for="person in people" v-bind:key="person.id">
                        <td>{{person.name}}</td>
                        <td>+27 {{person.phone.slice(-11)}}</td>
                        <td>{{person.email}}</td>
                        <td>{{person.dob}}</td>
                        <td>{{person.gender}}</td>
                        <td>{{person.car}}</td>
                        <td>{{person.colour}}</td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>

</template>

<script>
    export default {

        data(){
            return{
                people: '',
                person:'',
                items: '',
            }
        },

        methods:{
            getUsers(user_id){
                axios.get(`/api/data/`).then((res)=>{
                    this.people = res.data
                }).catch((error)=>{
                    console.log(error)
                })
            }
            
        },

        mounted() {
           this.getUsers()
        }
    }
</script>
