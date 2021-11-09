<template>


    <div class="container mx-auto ">

        <AddItemForm :editItem="editItem"/>

        <table class="table-auto mx-auto border-collapse border border-black-800 divide-y divide-fuchsia-300">
            <thead >
            <tr>
                <th></th>
                <th>Id</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in items" class="space-y-6 divide-y divide-fuchsia-300  ">
                <td ><input :class="item.completed ? 'opacity-50 cursor-not-allowed' : ''" type="checkbox" v-model="item.checkbox" v-on:change="isCompleted(item.id)" id="checkbox" class="form-check-input mx-3"></td>
                <td>{{ index + 1 }}</td>
                <td :class="item.completed ? 'line-through' : ''">{{ item.name }}</td>
                <td>
                    <button @click="removeItem(item.id)" class="">
                        <i class='fa fa-trash mx-5'/></button>
                    <button @click="updateItem(item)" class="" :class="item.completed ? 'opacity-50 cursor-not-allowed' : 'bg-gray-500'">
                        <i class='fa fa-edit mx-5'/></button>
                </td>
            </tr>
            </tbody>

        </table>
    </div>

</template>

<script>
import AddItemForm from "./AddItemForm";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import { BeakerIcon } from '@heroicons/vue/solid'

import {faCheckSquare, faTrash,} from '@fortawesome/free-solid-svg-icons'

export default {
        props:{
            items: Array,
        },
        data () {
            return {
                editItem: null,
            }
        },
        components:{
            AddItemForm,
            faTrash,
            faCheckSquare
        },
        methods:{
            removeItem(id){
                this.$inertia.delete('/items/' + id)
            },
            isCompleted(id){
                this.$inertia.put('/items/' + id)
            },
            updateItem(item){
                this.editItem = item;
            }
        },
    };
</script>
