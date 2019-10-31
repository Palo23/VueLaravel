<template>
<div class="card-body table-responsive-sm">
    <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Nombre de usuario</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <datos-componente
                                    v-for="(usuario, index) in usuarios"
                                    :key="usuario.id"
                                    :usuario="usuario"
                                    @actualizar="updateUsuario(index, ...arguments)"
                                    @borrar="borrarUsuario(index)"
                                >
                                </datos-componente>
                             </tbody>
                         </table>  

</div>                              
</template>
<script>
export default {
    props: ['modal'],
    data() {
        return {
            usuarios: [],
            modalShow: false,
        }
    },

    mounted() {
        axios.get('/usuarios')
        .then((res) => {
            this.usuarios = res.data;
        });
    },
    methods: {
        updateUsuario(index, usuario){
            this.usuarios[index] = usuario;
            alertify.success("Actualizado con éxito");
        },
        borrarUsuario(index, usuario){
            this.usuarios.splice(index, 1);
        },
    },
}
</script>


