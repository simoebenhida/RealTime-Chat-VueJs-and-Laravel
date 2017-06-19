<template>
    <div class="row">
	<div class="col-md-6 col-md-offset-3" style="margin-top:50px">
            <ul class="list-group">
                <li class="list-group-item" v-for="message in messages">{{ message.text }}</li>
            </ul>
        <div class="form-group">
            <input type="text" v-model="message" placeholder="message" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" v-on:click="envoyer">Envoyer</button>
        </div>
        </div>
        </div>

</template>

<script>
	export default{
		props : ['toid','uid'],
		data()
		{
			return {
				message : '',
				messages : [],
				idUser : this.uid,
				idTo : this.toid
			}
		},
		mounted()
		{
			Echo.channel('chat'+this.idUser)
   			 .listen('ChatMessage', (e) => {
        		console.log(e.message);
        		this.messages.push({
  		 	 	text : e.message
  		 	 	});
    			});
		},

		methods : {
			envoyer()
			{
				var ap = this;

				axios.post('/add_message', {
    			message: this.message,
    			toID : this.idTo
  			})
  			.then(function (response) {
  		 	 	ap.messages.push({
  		 	 	text : response.data.message
  		 	 });
  		 	 	ap.message = '';
  			})
  			.catch(function (error) {
    		console.log(error);
  			});
			}
		}
	}
</script>