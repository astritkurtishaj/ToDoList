<template >
    <div class="container mx-auto flex justify-center items-center my-4">
    <form class="mx-auto bg-gray-100 px-4 py-6 block space-y-6" @submit="submit">
        <p class="my-3 flex justify-center"><b>To Do List with Inertia.js</b></p>
        <label for="name">Task name:</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" placeholder="Write a task here..." v-model="this.form.name" />
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" >Save</button>
    </form>
    </div>
</template>

<script>


export default {
    props: {
        editItem: Object,
    },
    data: function () {
        return {

      form: this.$inertia.form({
          name: ''
      })
      }
    },
    updated() {
        this.form = this.$inertia.form({
            id: this.editItem.id || null,
            name: this.editItem.name || '',
        })
    },
    methods: {
      submit() {
          this.form.post('/store')
          this.form.reset()
      }
    }
}
</script>
