<template>
    <div>
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
            :class=" Number(this.estado_vacante) ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'"
            @click=" changeStatus() "
            :key="estado_vacante"
        >
            {{ Number(this.estado_vacante) ? 'Activa' : 'Inactiva' }}
        </span>
    </div>
</template>

<script>
    export default {
        props: [
            'estado',
            'vacanteId',
        ],
        mounted(){
            this.estado_vacante = Number(this.estado);
        },
        data(){
            return {
                estado_vacante : null,
            }
        },
        methods: {
            changeStatus(){
                this.estado_vacante = !this.estado_vacante

                const params = {
                    estado : this.estado_vacante,
                }

                axios.post('/vacantes/' + this.vacanteId, params)
                    .then(response => {
                        
                    })
                    .catch(error => console.log(error))
            }
        }
    }
</script>