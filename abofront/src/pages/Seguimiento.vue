<template>
<q-page class="q-pa-xs">
  <div class="row">
    <div class="col-12">
      <q-form @submit.prevent="buscar">
        <div class="row">
          <div class="col-12 col-md-10 q-pa-xs">
            <q-select use-input label="Ingresar codigo" v-model="codigo" :options="mails" outlined @filter="filterFn"/>
          </div>
          <div class="col-12 col-md-2 q-pa-xs flex flex-center">
            <q-btn label="Buscar" color="primary" icon="send" type="submit" />
          </div>
        </div>
      </q-form>
    </div>
    <div class="col-12 col-md-4">
      <q-banner dense class="bg-primary text-white">
        Datos de correspondencia
      </q-banner>
      <q-form>
        <div class="row">
          <div class="col-6 q-pa-xs"><q-input dense label="tipo" v-model="email.tipo2" outlined/></div>
          <div class="col-6 q-pa-xs"><q-input dense label="ref" v-model="email.ref" outlined/></div>
          <div class="col-6 q-pa-xs"><q-input dense label="remitente" v-model="email.remitente" outlined/></div>
          <div class="col-6 q-pa-xs"><q-input dense label="cargo" v-model="email.cargo" outlined/></div>
          <div class="col-6 q-pa-xs"><q-input dense label="institucion" v-model="email.institucion" outlined/></div>
          <div class="col-6 q-pa-xs"><q-input dense label="fecha" v-model="email.fecha" outlined/></div>
          <div class="col-6 q-pa-xs"><q-input dense label="folio" v-model="email.folio" outlined/></div>
          <div class="col-6 q-pa-xs"><q-input dense label="estado" v-model="email.estado" outlined/></div>
          <div class="col-12 q-pa-xs"><q-btn type="a" :href="url+'/../imagenes/'+email.archivo" target="__blank" v-if="email.archivo!='' && email.archivo!=undefined" class="full-width" color="primary" icon="file_download"  :label="email.archivo" outlined/></div>
        </div>
      </q-form>

    </div>
    <div class="col-12 col-md-8">
      <q-banner dense class="bg-amber text-white">
        Datos de historial
      </q-banner>
        <div class="row" v-for="l in email.logs" :key="l.id">
<!--          <div class="col-4 q-pa-xs"><q-chip dense color="primary" icon="alarm" :label="'DE '+l.remitente"  /></div>-->
          <div class="col-6 q-pa-xs"><q-chip dense color="secondary" icon="directions" :label="'A '+l.destinatario"/></div>
          <div class="col-6 q-pa-xs"><q-chip dense color="info" icon="home" :label="'U '+l.unit.nombre"/></div>
        </div>
<!--      <pre>{{email.logs}}</pre>-->
    </div>
  </div>
</q-page>
</template>

<script>
export default {
  data(){
    return{
      url:process.env.API,
      codigo:'',
      email:{},
      mails:[],
      mails2:[],
    }
  },
  created() {
    this.$q.loading.show()
    this.$axios.get(process.env.API+'/todos').then(res=>{
      this.mails=[]
      res.data.forEach(r=>{
        // console.log(r)
        r.label=r.remitente+' '+r.ref+' '+r.codexterno+' '+r.codinterno
        this.mails.push(r)
        this.mails2.push(r)
      })
      // this.mails=res.data
      this.$q.loading.hide()
    }).catch(err=>{
      this.$q.loading.hide()
      this.$q.notify({
        message:err.response.data.message,
        color:'red',
        icon:'error'
      })
    })
  },
  methods:{
    buscar(){
      this.$q.loading.show()
      this.email={}
      console.log(this.codigo.codinterno)
      this.$axios.post(process.env.API+'/buscar',{codigo:this.codigo.codigo}).then(res=>{
        // console.log(res.data)
        if (res.data.length>0)
        this.email=res.data[0]
        this.$q.loading.hide()
      })
    },
    filterFn (val, update) {
      if (val === '') {
        update(() => {
          this.mails = this.mails2
          // here you have access to "ref" which
          // is the Vue reference of the QSelect
        })
        return
      }

      update(() => {
        const needle = val.toLowerCase()
        this.mails = this.mails2.filter(v => v.label.toLowerCase().indexOf(needle) > -1)
      })
    }
  }
}
</script>

<style scoped>

</style>
