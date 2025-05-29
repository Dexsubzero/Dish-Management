        // Simple quantity adjustment functionality
        document.querySelectorAll('.quantity-btn').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentElement.querySelector('.quantity-input');
                let value = parseInt(input.value);

                if (this.querySelector('.fa-minus')) {
                    if (value > 1) {
                        input.value = value - 1;
                    }
                } else if (this.querySelector('.fa-plus')) {
                    input.value = value + 1;
                }

                // In a real application, you would update the cart total here
            });
        });

        // Remove item functionality
        document.querySelectorAll('.btn-outline-danger').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const cartItem = this.closest('.cart-item');
                cartItem.style.opacity = '0';
                setTimeout(() => {
                    cartItem.remove();
                    // In a real application, you would update the cart summary here
                }, 300);
            });
        });
