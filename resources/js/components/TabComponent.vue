<template>
    <div>
                
            <div class="">
                <div class="row d-flex justify-content-between mt-4">
                    <div class="col-lg-6">
                        <div>
                            <form @submit.prevent = "firstForm" class="user"> 
                                <div class="form-group">
                                        <input v-model="form.name" :class="{'is-invalid' : form.errors.has('name')}" type="text" name="name" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Name*" required>
                                        <span class="text-danger pt-3" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                                </div>

                                <div class="form-group">
                                        <input v-model="form.email" :class="{'is-invalid' : form.errors.has('email')}" type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address*" required>
                                        <span class="text-danger pt-3" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
                                </div>

                                <div class="form-group">
                                        <input v-model="form.phone" :class="{'is-invalid' : form.errors.has('email')}" type="phone" name="phone" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Phone Number*" required>
                                        <span class="text-danger pt-3" v-if="form.errors.has('phone')" v-text="form.errors.get('phone')"></span>
                                </div>

                                <div class="form-group">
                                        <input v-model="form.dob" type="date" name="dob" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Date Of Birth" >
                                </div>

                                <div class="form-group">
                                        <input v-model="form.gender" type="text" name="gender" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Gender" >
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Submit
                                </button>
                             </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form @submit.prevent = "secondForm" class="user"> 
                            <div class="form-group">
                                    <input v-model="form.name" :class="{'is-invalid' : form.errors.has('name')}" type="text" name="name" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Name*" required>
                                    <span class="text-danger pt-3" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                            </div>

                            <div class="form-group">
                                    <input v-model="form.email" :class="{'is-invalid' : form.errors.has('email')}" type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address*" required>
                                    <span class="text-danger pt-3" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
                            </div>

                            <div class="form-group">
                                    <input v-model="form.phone" :class="{'is-invalid' : form.errors.has('email')}" type="phone" name="phone" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Phone Number*" required>
                                    <span class="text-danger pt-3" v-if="form.errors.has('phone')" v-text="form.errors.get('phone')"></span>
                            </div>
                            <div class="form-group">
                                    <input v-model="form.car" type="text" name="car" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Car Make">
                            </div>

                            <div class="form-group">
                                    <input v-model="form.colour" type="text" name="car" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Car Colour">
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
                <hr>
            </div>
            

       
    </div>
</template>

<script>
    export default {

        data(){
            return{
                form: new Form({
                    name: '',
                    email: '',
                    phone: '',
                    dob: '',
                    gender: '',
                    car: '',
                    colour: '',

                })
            }
        },

        methods:{
            firstForm(){
                let data = new FormData();
                data.append('name', this.form.name)
                data.append('email', this.form.email)
                data.append('phone', this.form.phone)
                data.append('dob', this.form.dob)
                data.append('gender', this.form.gender)

                axios.post('/api/first/user', data).then ((res)=>{
                    this.form.reset()
                    alert('User Details Saved Successfully')
                }).catch((error)=> {
                   this.form.errors.record(error.response.data.errors)
               })
            },
            secondForm(){
                let data = new FormData();
                data.append('name', this.form.name)
                data.append('email', this.form.email)
                data.append('phone', this.form.phone)
                data.append('car', this.form.car)
                data.append('colour', this.form.colour)

                axios.post('/api/second/user', data).then ((res)=>{
                    this.form.reset()
                    alert('User Details Saved Successfully')
                }).catch((error)=> {
                   this.form.errors.record(error.response.data.errors)
               })
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
