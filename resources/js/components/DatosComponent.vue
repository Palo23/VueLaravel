<template>               
                                <tr>
                                    <th>
                                    <input v-if="modoEdicion" id="" class="form-control" type="text" v-model="usuario.name">
                                    <p v-else>{{usuario.name}}</p>
                                    </th>
                                    <td>
                                        <input v-if="modoEdicion" id="" class="form-control" type="text" v-model="usuario.email">
                                        <p v-else>{{usuario.email}}</p>
                                        </td>
                                    <td>{{usuario.roles[0].nombre}}</td>
                                    <td>
                                        <div v-if="modoEdicion">
                                            <button class="btn btn-success" type="submit" @click="actualizarUsuario">Guardar Cambios</button>
                                            <button class="btn btn-danger" type="submit" @click="cancelar">Cancelar</button>
                                        </div>
                                        <div v-else>
                                            <button class="btn btn-warning" type="submit" @click="editar">Editar</button>
                                            <button class="btn btn-danger" type="submit" @click="eliminarUsuario">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
</template>

<script>
    export default {
        props: ['usuario'],
        data() {
            return {
                prop: {id: '', name: '', email: '', rol: ''},
                modoEdicion: false,
                modoEliminar: false
            }
        },
        methods: {
            editar(){
                this.modoEdicion = true;
            },
            cancelar(){
                this.modoEdicion = false;
            },
            actualizarUsuario(){
                const params = {
                    name: this.usuario.name,
                    email: this.usuario.email
                };
                axios.put(`/usuarios/${this.usuario.id}`, params).then((res) => {
                    this.modoEdicion = false;
                    const usuario = res.data;
                    this.$emit('actualizar', usuario)
                })
            },
            enviarUsuario(){
                const params = {
                    id: this.usuario.id,
                    name: this.usuario.name,
                    email: this.usuario.email
                };
                this.$emit('modal', params);
            },
            eliminarUsuario(){
                axios.delete(`usuarios/${this.usuario.id}`).then((res) => {
                    this.$emit('borrar');
                });
            },
        },
    }
</script>