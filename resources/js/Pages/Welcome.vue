<template>
    <v-app>
        <v-main>
            <v-card  variant="outlined" class="mx-auto mt-16" max-width="500">
                <v-card-text>
                    <v-autocomplete
                        label="Select Country"
                        v-model="form.country"
                        :items="$page.props.countries"
                        density="comfortable"
                        variant="outlined"
                        item-title="name"
                        item-value="id"
                        @update:modelValue="getStates"
                        clearable
                        :error-messages="$page.props.errors.country"
                    />

                    <v-select
                        clearable
                        :disabled="!form.country"
                        label="Select State/Province"
                        variant="outlined"
                        v-model="form.state"
                        required
                        :items="states"
                        density="comfortable"
                        item-title="name"
                        item-value="id"
                        @update:modelValue="getCities"
                        :error-messages="$page.props.errors.state"
                    />

                    <v-select
                        variant="outlined"
                        clearable
                        :disabled="!form.state"
                        label="Select City"
                        v-model="form.city"
                        required
                        :items="cities"
                        density="comfortable"
                        item-title="name"
                        item-value="id"
                        :error-messages="$page.props.errors.city"
                    />
                </v-card-text>
            </v-card>
        </v-main>
    </v-app>
</template>

<script>
    import axios from "axios";
    export default {
        data(){
            return{
                form:this.$inertia.form({
                    state:null,
                    city:null,
                    country:null,
                }),

                states:[],
                cities:[],
            }
        },



        methods:{

            getStates(){

                if(this.form.country){
                    axios.get('/country/'+this.form.country+'/states').then((res)=>{
                        this.states = res.data.states
                    })
                }
            },

            getCities(){
                if(this.form.state){
                    axios.get('/state/'+this.form.state+'/cities').then((res)=>{
                        this.cities = res.data.cities
                    })
                }
            },

        }
    }
</script>
