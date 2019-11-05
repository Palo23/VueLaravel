<template>

<div class="col-sm-6 py-2">
      <div class="card">
          <img width="50" height="100" :src="curso.archivo.ruta" class="card-img-top" alt="...">
        <div v-if="modoEdicion" class="card-body">
            <h5 class="card-title">{{curso.nombre}}</h5>
            <p class="card-text">{{curso.description}}</p>
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" v-model="password">
                <button class="btn btn-primary" @click="inscribir">Inscribir curso</button>
                <button class="btn btn-danger" @click="cancelar">Cancelar</button>
        </div>
        <div v-else class="card-body">
        <h5 class="card-title">{{curso.nombre}}</h5>
          <p class="card-text">{{curso.description}}</p>
          <button class="btn btn-primary" @click="editar">Inscribirse</button>
        </div>
      </div>
    </div>

</template>

<script>

export default {
        props: ['curso'],
        data() {
            return {
                prop: {id: '', nombre: '', description: '', password: ''},
                modoEdicion: false,
                password: ''
            }
        },
        methods: {
            editar(){
                this.modoEdicion = true;
                console.log(this.curso.id);
            },
            cancelar(){
                this.modoEdicion = false;
            },
            inscribir(){
                const params = {
                    password: this.curso.password
                };
                axios.put(`/inscripcion/${this.curso.id}`, params).then((res) => {
                    this.modoEdicion = false;
                    const curso = res.data;
                    this.$emit('actualizar', curso)
                })
            },
    }
}

</script>