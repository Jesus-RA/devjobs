<template>
    <button
        type="button"
        class="text-red-600 hover:text-red-900  mr-5"
        @click="eliminarVacante"
    >Eliminar</button>
</template>

<script>
    export default {
        props: [
            'vacanteId'
        ],
        methods: {
            eliminarVacante(){
                this.$swal({
                    title: '¿Deseas eliminar esta vacante?',
                    text: "Una vez eliminada no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí',
                    cancelButtonText: 'No',
                }).then((result) => {
                    if (result.value) {

                        const params = {
                            id : this.vacanteId,
                            _method : 'delete',
                        }

                        axios.post(`/vacantes/${this.vacanteId}`, params)
                            .then(response => {
                                console.log(response);
                                this.$swal(
                                    'Vacante eliminada!',
                                    response.data.mensaje,
                                    'success'
                                )

                                // Eliminar del DOM
                                this.$el.parentNode.parentNode.parentNode.removeChild( this.$el.parentNode.parentNode );
                            })
                            .catch(error => console.log(error))
                    }
                })
            }
        }
    }
</script>