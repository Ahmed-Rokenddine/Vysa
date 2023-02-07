
  

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
<body>
  
  <ul class="nav nav-tabs nav-justified flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4" id="tabs-tabJustify" role="tablist">
    <li class="nav-item flex-grow text-center" role="presentation">
      <a href="#tabs-homeJustify" class=" nav-link w-full block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent active" id="tabs-home-tabJustify" data-bs-toggle="pill" data-bs-target="#tabs-homeJustify" role="tab"
        aria-controls="tabs-homeJustify" aria-selected="true">Create VISA Appointementt</a>
    </li>
    <li class="nav-item flex-grow text-center" role="presentation">
      <a href="#tabs-profileJustify" class="nav-link w-full block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent" id="tabs-profile-tabJustify" data-bs-toggle="pill" data-bs-target="#tabs-profileJustify" role="tab"
        aria-controls="tabs-profileJustify" aria-selected="false">Check VISA Appointementt</a>
    </li>
    
  </ul>
  <div class="tab-content" id="tabs-tabContentJustify">
    <div class="tab-pane fade show active" id="tabs-homeJustify" role="tabpanel"      aria-labelledby="tabs-home-tabJustify">
      <template>
        <full-calendar
          :plugins="calendarPlugins"
          :header="header"
          :events="events"
          :default-view="defaultView"
          :slot-duration="slotDuration"
          :slot-label-interval="slotLabelInterval"
          :slot-label-format="slotLabelFormat"
          :min-time="minTime"
          :max-time="maxTime"
          :locale="locale"
        />
      </template>
      
      
      
          
    </div>
    <div class="tab-pane fade" id="tabs-profileJustify" role="tabpanel" aria-labelledby="tabs-profile-tabJustify">
        <div id="app">
           
            <!-- <template>
              <div class="container mx-auto p-6">
                <h1 class="text-3xl mb-4">Search TLS</h1>
                <div class="flex">
                  <input class="w-full p-2 border border-gray-400" type="text" v-model="searchtoken" placeholder="Enter TLS ID">
                  <button class="bg-blue-500 text-white p-2" @click="searchTls">Search</button>
                </div>
                <div class="mt-4" v-if="tls">
                  
                  <p><strong>Nom:</strong> {{ tls.Nom }}</p>
                  <p><strong>Prenom:</strong> {{ tls.Prenom }}</p>
                  <p><strong>Birthday:</strong> {{ tls.Birthday }}</p>
                  <p><strong>Nationalite:</strong> {{ tls.Nationalite }}</p>
                  <p><strong>Situation:</strong> {{ tls.Situation }}</p>
                  <p><strong>adresse:</strong> {{ tls.adresse }}</p>
                  <p><strong>Type:</strong> {{ tls.Type }}</p>
                  <p><strong>Start:</strong> {{ tls.Start }}</p>
                  <p><strong>End:</strong> {{ tls.End }}</p>
                  <p><strong>Doctype:</strong> {{ tls.Doctype }}</p>
                  <p><strong>Rendezvous:</strong> {{ tls.Rendezvous }}</p>
                  <p><strong>Token:</strong> {{ tls.Token }}</p>
                </div>
                <button class="bg-red-500 text-white p-2" v-if="tls" @click="deleteTls">Delete</button>
                <div class="mt-4" v-if="notls"> No matches </div>
              </div>
            </template> -->
            <template>
              <div class="container mx-auto p-6">
                <h1 class="text-3xl mb-4">Search TLS</h1>
                <div class="flex">
                  <input class="w-full p-2 border border-gray-400" type="text" v-model="searchtoken" placeholder="Enter TLS ID">
                  <button class="bg-blue-500 text-white p-2" @click="searchTls">Search</button>
                </div>
                <div class="mt-4" v-if="tls">
                  <p><strong>Nom:</strong> 
                    <input class="w-full p-2 border border-gray-400" type="text" id="Nom" v-model="tls.Nom" readonly/>
                  </p>
                  <p><strong>Prenom:</strong> 
                    <input class="w-full p-2 border border-gray-400" type="text" id="Prenom" v-model="tls.Prenom" readonly/>
                  </p>
                  <p><strong>Birthday:</strong> 
                    <input class="w-full p-2 border border-gray-400" type="date"  id="Birthday" v-model="tls.Birthday" readonly/>
                  </p>
                  <p><strong>Nationalite:</strong> 
                    <input class="w-full p-2 border border-gray-400" type="text" id="Nationalite" v-model="tls.Nationalite" readonly/>
                  </p>
                  <p><strong>Situation:</strong> 
                    <input class="w-full p-2 border border-gray-400" type="text" id="Situation" v-model="tls.Situation" readonly/>
                  </p>
                  <p><strong>adresse:</strong> 
                    <input class="w-full p-2 border border-gray-400" type="text" id="adresse" v-model="tls.adresse" readonly/>
                  </p>
                  <p><strong>Type:</strong> 
                    <input class="w-full p-2 border border-gray-400" type="text" id="Type" v-model="tls.Type" readonly/>
                  </p>
                  <p><strong>Start:</strong> 
                    <input class="w-full p-2 border border-gray-400" type="text" id="Start" v-model="tls.Start" readonly/>
                  </p>
                  <p><strong>End:</strong> 
                    <input class="w-full p-2 border border-gray-400" type="text" id="End" v-model="tls.End" readonly/>
                  </p>
                  <p><strong>Doctype:</strong> 
                    <input class="w-full p-2 border border-gray-400" type="text" id="Doctype" v-model="tls.Doctype" readonly/>
                  </p>
                </div>
                <button class="bg-red-500 text-white p-2 mr-2" v-if="tls" @click="deleteTls">Delete</button>
                <button class="bg-green-500 text-white p-2" v-if="tls" @click="onButtonClick">                  {{ buttonText }}                </button>
                <div v-if="formSuccess">
                  <p>Form submitted successfully!</p>
                </div>
                <div class="mt-4" v-if="notls"> No matches </div>
              </div>
            </template>
           
          </div>
    </div>
    
  </div>
  
<script>
    // const app = new Vue({
    //   el: '#app',
    //   data() {
        
    //     return {
    //       formSuccess: false,
    //       searchId: '',
    //       tls: null,
    //       notls: null
    //     };
    //   },
    //   methods: {
    //         async searchTls() {
                
    //           try {
    //             const response = await axios.get(`../../Visa/api/tls/read_single.php?token=${this.searchtoken}`);
                
    //             if (response.data.Nom != undefined) {
    //               this.tls = response.data;
    //               this.notls ="";
                  
    //             }
    //             else{this.notls = "2";this.tls ="";}
                
                  
                
    //           } catch (error) {
    //             console.error(error);
                
    //           }
    //         },
    //         async submitForm() {
    //     try {
    //       const response = await axios.post('../../Visa/api/tls/create.php', this.form)
    //       console.log(response)
    //     } catch (error) {
    //       console.error(error)
    //     }
    //   },
    //       async deleteTls() {
    //           try {
    //               const response = await axios.delete(`../../Visa/api/tls/delete.php?token=${this.searchtoken}`);
    //               this.tls = "";
    //               console.log(response);
    //           } catch (error) {
    //               console.error(error);
    //           }
    //       },
    //       async modifyTls() {         
    //                   try {
    //                     const response = await axios.post(`../../Visa/api/tls/update.php?token=${this.searchtoken}`,this.tls);
    //                     console.log(response);
    //                     this.formSuccess = true;
    //                   } catch (error) {
    //                     console.error(error);
    //                   }
                    
    //               }
      
    //       }
    // });
    const app = new Vue({
  el: '#app',
  data() {
    return {
      formSuccess: false,
      searchId: '',
      tls: null,
      notls: null,
      isModifying: true
    };
  },
  computed: {
    buttonText() {
      return this.isModifying ? "Modify" : "Save";
    },
    currentFunction() {
      return this.isModifying ? "modifyTls" : "saveTls";
    }
  },
  methods: {
    onButtonClick() {
      this[this.currentFunction]();
      this.isModifying = !this.isModifying;
    },
    async searchTls() {
      try {
        const response = await axios.get(`../../Visa/api/tls/read_single.php?token=${this.searchtoken}`);
        if (response.data.Nom != undefined) {
          this.tls = response.data;
          this.notls = "";
        } else {
          this.notls = "2";
          this.tls = "";
        }
      } catch (error) {
        console.error(error);
      }
    },
    async submitForm() {
      try {
        const response = await axios.post('../../Visa/api/tls/create.php', this.form)
        console.log(response)
      } catch (error) {
        console.error(error)
      }
    },
    async deleteTls() {
      try {
        const response = await axios.delete(`../../Visa/api/tls/delete.php?token=${this.searchtoken}`);
        this.tls = "";
        console.log(response);
      } catch (error) {
        console.error(error);
      }
    },
    async modifyTls() {
      this.formSuccess = false;
      let inputs = document.getElementsByTagName("input");
      for (let i = 0; i < inputs.length; i++) {
        inputs[i].readOnly = false;
      }   
    },
    async saveTls() {
      try {
        const response = await axios.put(`../../Visa/api/tls/update.php?token=${this.searchtoken}`, this.tls);
        console.log(response);
        this.formSuccess = true;
        let inputs = document.getElementsByTagName("input");
        for (let i = 0; i < inputs.length; i++) {
        inputs[i].readOnly = true;
      }
      } catch (error) {
        console.error(error);
      }
    }
  }
});

  </script>
  
  
  
  
  
      
      
     
      
</body>
</html>






    

           



