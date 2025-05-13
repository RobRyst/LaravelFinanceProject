<template>
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" @click.self="emit('close')">
        <div class="w-[500px] max-w-full rounded bg-white p-6 shadow-lg">
            <form class="flex flex-col gap-3" @submit.prevent="submit">
                <div class="flex flex-row items-center gap-4">
                    <label>Status: </label>
                    <select v-model="form.status">
                        <option value="draft">Draft</option>
                        <option value="sent">Sent</option>
                        <option value="paid">Paid</option>
                        <option value="overdue">Overdue</option>
                    </select>
                </div>

                <div class="flex flex-row items-center gap-4">
                    <label>User: </label>
                    <select v-model="form.user_id">
                        <option disabled value="">Select a user</option>
                        <option v-for="user in users" :key="user.id" :value="user.id">{{ user.id }}. {{ user.firstname }} {{ user.lastname }}</option>
                    </select>
                </div>
                <div class="flex flex-row items-center gap-4">
                    <label>Subtotal: </label>
                    <input v-model="form.sub_total" type="number" step="0.01" @input="updateTotal" />
                </div>

                <div class="flex flex-row items-center gap-4">
                    <label>Discount: </label>
                    <select v-model="form.discount" @change="updateTotal">
                        <option value="zero">0%</option>
                        <option value="five">5%</option>
                        <option value="ten">10%</option>
                        <option value="fifteen">15%</option>
                        <option value="twenty">20%</option>
                    </select>
                </div>

                <div class="flex flex-row items-center gap-4">
                    <label>Total: </label>
                    <input v-model="form.total" type="number" step="0.01" disabled />
                </div>

                <div class="flex flex-row items-center gap-4">
                    <label>Created Date: </label>
                    <input v-model="form.invoice_created" type="date" />
                </div>

                <div class="flex flex-row items-center gap-4">
                    <label>Due Date: </label>
                    <input v-model="form.invoice_due_date" type="date" />
                </div>

                <button class="mt-4 rounded bg-zinc-800 px-4 py-2 text-white hover:bg-blue-700" type="submit">Create Invoice</button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import axios from 'axios';
import Swal from 'sweetalert2';
import { defineEmits, onMounted, ref } from 'vue';

const emit = defineEmits(['close']);

const users = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get('http://localhost:8000/api/users');
        users.value = response.data;
    } catch (error) {
        console.error('Failed to get users: ', error);
    }
});

const form = useForm({
    user_id: '',
    status: 'draft',
    sub_total: '',
    discount: 'zero',
    total: '',
    invoice_created: '',
    invoice_due_date: '',
});

function updateTotal() {
    const subTotal = parseFloat(form.sub_total);
    let discountPercentage = 0;

    switch (form.discount) {
        case 'five':
            discountPercentage = 5;
            break;
        case 'ten':
            discountPercentage = 10;
            break;
        case 'fifteen':
            discountPercentage = 15;
            break;
        case 'twenty':
            discountPercentage = 20;
            break;
        default:
            discountPercentage = 0;
    }

    if (!isNaN(subTotal)) {
        const discountAmount = (subTotal * discountPercentage) / 100;
        const total = subTotal - discountAmount;
        form.total = total.toFixed(2);
    } else {
        form.total = '';
    }
}

function submit() {
    let discountNumber = 0;
    switch (form.discount) {
        case 'five':
            discountNumber = 5;
            break;
        case 'ten':
            discountNumber = 10;
            break;
        case 'fifteen':
            discountNumber = 15;
            break;
        case 'twenty':
            discountNumber = 20;
            break;
        default:
            discountNumber = 0;
    }

    form.discount = discountNumber;

    form.post('/invoice', {
        onError: (errors) => {
            console.log(errors);
        },
        onSuccess: () => {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Invoice has been created successfully',
                showConfirmButton: false,
                timer: 1500,
            });
            emit('close');
        },
    });
}
</script>
