(function() {
	var StripeBilling = {
		init: function() {
			this.form = $('#billing-form');
			this.submitButton = this.form.find('input[type=submit]');
			this.submitButtonValue = this.submitButton.val();

			var stripeKey = $('meta[name="publishable-key"]').attr('content');
			Stripe.setPublishableKey(stripeKey);

			this.bindEvents();
		},

		bindEvents: function() {
			this.form.on('submit', $.proxy(this.sendToken, this));
		},

		sendToken: function(event) {
			this.submitButton.val('Your payment is being processed...').prop('disabled', true);
			event.preventDefault();

			Stripe.createToken(this.form, $.proxy(this.stripeReponseHandler, this));


		},

		stripeReponseHandler: function(status, response) {
			console.log(status, response); // For debugging purposes
			
			if (response.error) {
				this.form.find('.payment-errors').show().text(response.error.message);
				return this.submitButton.prop('disabled', false).val(this.submitButtonValue);
			}


			$('<input>', {
				type: 'hidden',
				name: 'stripe-token',
				value: response.id

			}).appendTo(this.form);

			this.form[0].submit(); // Prevent recursion 
		}

	};

	StripeBilling.init();

})();