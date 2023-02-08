const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#upass");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });
        const pass = document.querySelector('#upass');
        const message = document.querySelector('.message');
       
        pass.addEventListener('keyup', function (e) {
            if (e.getModifierState('CapsLock')) {
                message.textContent = 'Caps lock is on';
            } else {
                message.textContent = '';
            }
        });