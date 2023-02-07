<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>why</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
<script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</head>
<body >
  
 <section id="app">
        <template>
            <form @submit.prevent="submitForm">
              <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="Nom">
                  Nom
                </label>
                <input 
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                  id="Nom" 
                  type="text" 
                  v-model="form.Nom">
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="Prenom">
                  Prenom
                </label>
                <input 
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                  id="Prenom" 
                  type="text" 
                  v-model="form.Prenom">
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="Birthday">
                  Birthday
                </label>
                <input 
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                  id="Birthday" 
                  type="date" 
                  v-model="form.Birthday">
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="Nationalite">
                  Nationalite
                </label>
                <input 
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                  id="Nationalite" 
                  type="text" 
                  v-model="form.Nationalite">
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="Situation">
                  Situation
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Situation"   v-model="form.Situation">
                  <option selected value="Celibataire" >Celibataire</option>
                  <option value="Couple">Couple</option>
                </select>
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="adresse">
                  adresse
                </label>
                <input 
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                  id="adresse" 
                  type="text" 
                  v-model="form.adresse">
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="type">
                  VISA Type
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="type"   v-model="form.type">
                  <option selected value="VISA" >VISA</option>
                  <option value="Passport">Passport</option>
                </select>
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="Start">
                  Start
                </label>
                <input 
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                  id="Start" 
                  type="date" 
                  v-model="form.Start">
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="End">
                  End
                </label>
                <input 
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                  id="End" 
                  type="date" 
                  v-model="form.End">
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="Doctype">
                  Paper Type
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Doctype"   v-model="form.Doctype">
                  <option selected value="ID" >ID</option>
                  <option value="3a9d zdyad">3a9d zdyad</option>
                </select>
              </div>
              
              <div class="mb-4">
                <button 
                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                  type="submit">
                  Submit
                </button>
              </div>
              
            </form>
            <div v-if="formSuccess">
                <p>Form submitted successfully!</p>
              </div>
          </template>
        </section>      
    
    
  <script>
  const app = new Vue({
    el: '#app',
    data() {
      return {
        formSuccess: false,
        form: {
      Nom: '',
      Prenom: '',
      Birthday: ''
      
        }
      };
    },
    methods: {
          
          async submitForm() {
      try {
        const response = await axios.post('../../Visa/api/tls/create.php', this.form)
        console.log(response)
        this.formSuccess = true;
        Object.keys(this.form).forEach(key => {        this.form[key] = '';      });

      } catch (error) {
        console.error(error)
      }
    }
        }
  });

  
</script>
      
      
     
      
</body>
</html>




