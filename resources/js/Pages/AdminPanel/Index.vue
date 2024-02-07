<template>
    <div class="admin-panel">
        <h1 class="panel-title">Pannello di Gestione Ristoranti</h1>
        <ul class="ristoranti-list">
            <li v-for="ristorante in ristoranti" :key="ristorante.id" class="ristorante-item">
                {{ ristorante.nome }}
                {{ ristorante.id }}
                <button @click="deleteRistorante(ristorante.id)" class="delete-button">Elimina</button>
            </li>
        </ul>
        <form @submit.prevent="submitRistorante" class="add-ristorante-form">
            <input type="text" v-model="newRistorante.nome" placeholder="Inserisci il nome del ristorante"
                class="input-field" />
            <button type="submit" class="add-button">Aggiungi Ristorante</button>
        </form>
    </div>
</template>

<style>
.admin-panel {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.panel-title {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
}

.ristoranti-list {
    list-style: none;
    padding: 0;
}

.ristorante-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 0;
    border-bottom: 1px solid #eee;
}

.delete-button {
    background-color: #f44336;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}

.delete-button:hover {
    background-color: #d32f2f;
}

.add-ristorante-form {
    margin-top: 20px;
    display: flex;
    align-items: center;
}

.input-field {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.add-button {
    background-color: #4caf50;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 10px;
}

.add-button:hover {
    background-color: #388e3c;
}
</style>
  
<script>
export default {
    data() {
        return {
            ristoranti: [],
            newRistorante: {
                nome: '',
            },
        };
    },
    mounted() {
        console.log(this.$page.props.ristoranti);
        this.ristoranti = this.$page.props.ristoranti;
    },
    methods: {
        async submitRistorante() {
            await this.$inertia.post('/create/ristorante', this.newRistorante);
            this.newRistorante.nome = '';

            //await this.fetchRistoranti(); 
        },
        /**
        * @param {number} id - The ID of the restaurant to be deleted.
        */
        async deleteRistorante(id) {
            // Ask for confirmation before deleting the restaurant
            if (confirm('Sei sicuro di voler eliminare questo ristorante?')) {
                // Send a DELETE request to the server to delete the restaurant
                await this.$inertia.delete(`delete/ristorante/${id}`);
            }
        },
        async fetchRistoranti() {
            //TODPOL finire e testare la funzione di fetch per aggiornare pagina post creazione e cancellazione ristoranti
            await this.$inertia.get('/admin');
        }
    }
};
</script>