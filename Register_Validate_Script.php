<script>
/* ----------------------------

	CustomValidation prototype

	- Keeps track of the list of invalidity messages for this input
	- Keeps track of what validity checks need to be performed for this input
	- Performs the validity checks and sends feedback to the front end

---------------------------- */

function CustomValidation(input) {
    this.invalidities = [];
    this.validityChecks = [];

    //add reference to the input node
    this.inputNode = input;

    //trigger method to attach the listener
    this.registerListener();
}

CustomValidation.prototype = {
    addInvalidity: function (message) {
        this.invalidities.push(message);
    },
    getInvalidities: function () {
        return this.invalidities.join('. \n');
    },
    checkValidity: function (input) {
        for (var i = 0; i < this.validityChecks.length; i++) {

            var isInvalid = this.validityChecks[i].isInvalid(input);
            if (isInvalid) {
                this.addInvalidity(this.validityChecks[i].invalidityMessage);
            }

            var requirementElement = this.validityChecks[i].element;

            if (requirementElement) {
                if (isInvalid) {
                    requirementElement.classList.add('invalid');
                    requirementElement.classList.remove('valid');
                } else {
                    requirementElement.classList.remove('invalid');
                    requirementElement.classList.add('valid');
                }

            } // end if requirementElement
        } // end for
    },
    checkInput: function () { // checkInput now encapsulated

        this.inputNode.CustomValidation.invalidities = [];
        this.checkValidity(this.inputNode);

        if (this.inputNode.CustomValidation.invalidities.length === 0 && this.inputNode.value !== '') {
            this.inputNode.setCustomValidity('');
        } else {
            var message = this.inputNode.CustomValidation.getInvalidities();
            this.inputNode.setCustomValidity(message);
        }
    },
    registerListener: function () { //register the listener here

        var CustomValidation = this;

        this.inputNode.addEventListener('keyup', function () {
            CustomValidation.checkInput();
        });


    }

};



/* ----------------------------

	Validity Checks

	The arrays of validity checks for each input
	Comprised of three things
		1. isInvalid() - the function to determine if the input fulfills a particular requirement
		2. invalidityMessage - the error message to display if the field is invalid
		3. element - The element that states the requirement

---------------------------- */

var usernameValidityChecks = [
    {
        isInvalid: function (input) {
            return input.value.length < 3;
        },
        invalidityMessage: "ต้องมีอักขระอย่างน้อย 3 ตัว",
        element: document.querySelector('label[for="Full_Name_Register"] .input-requirements li:nth-child(1)')
    },
    {
        isInvalid: function (input) {
            var illegalCharacters = input.value.match(/[^a-zA-Z0-9]/g);
            return illegalCharacters ? true : false;
        },
        invalidityMessage: "อนุญาตให้ใช้ตัวอักษรและตัวเลขเท่านั้น",
        element: document.querySelector('label[for="Full_Name_Register"] .input-requirements li:nth-child(2)')
    }
];

var emailValidityChecks = [
    {
        isInvalid: function (input) {
            return !input.value.match(/[\!\@\#\$\%\^\&\*]/g);
        },
        invalidityMessage: "ต้องมีอักขระพิเศษ (เช่น @)",
        element: document.querySelector('label[for="Email_Register"] .input-requirements li:nth-child(1)')
    }
        


];

var passwordValidityChecks = [
    {
        isInvalid: function (input) {
            return input.value.length < 8 | input.value.length > 20;
        },
        invalidityMessage: "ต้องอยู่ระหว่าง 8 ถึง 20 อักขระ",
        element: document.querySelector('label[for="Password_Register"] .input-requirements li:nth-child(1)')
    },
    {
        isInvalid: function (input) {
            return !input.value.match(/[0-9]/g);
        },
        invalidityMessage: "ต้องมีอย่างน้อย 1 หมายเลข",
        element: document.querySelector('label[for="Password_Register"] .input-requirements li:nth-child(2)')
    },
    {
        isInvalid: function (input) {
            return !input.value.match(/[a-z]/g);
        },
        invalidityMessage: "ต้องมีตัวพิมพ์เล็กอย่างน้อย 1 ตัว",
        element: document.querySelector('label[for="Password_Register"] .input-requirements li:nth-child(3)')
    },
    {
        isInvalid: function (input) {
            return !input.value.match(/[A-Z]/g);
        },
        invalidityMessage: "ต้องมีตัวพิมพ์ใหญ้อย่างน้อย 1 ตัว",
        element: document.querySelector('label[for="Password_Register"] .input-requirements li:nth-child(4)')
    },
   
];

var passwordRepeatValidityChecks = [
    {
        isInvalid: function () {
            return PasswordRepeat_Register.value != Password_Register.value;
        },
        invalidityMessage: 'รหัสผ่านนี้ต้องตรงกับรหัสแรก',
        element: document.querySelector('label[for="PasswordRepeat_Register"] .input-requirements li:nth-child(1)')
    }
];


/* ----------------------------

	Setup CustomValidation

	Setup the CustomValidation prototype for each input
	Also sets which array of validity checks to use for that input

---------------------------- */

var Full_Name_Register = document.getElementById('Full_Name_Register');
var Email_Register = document.getElementById('Email_Register');
var Password_Register = document.getElementById('Password_Register');
var PasswordRepeat_Register = document.getElementById('PasswordRepeat_Register');



//Register_Form_Validate
Full_Name_Register.CustomValidation = new CustomValidation(Full_Name_Register);
Full_Name_Register.CustomValidation.validityChecks = usernameValidityChecks;

Password_Register.CustomValidation = new CustomValidation(Password_Register);
Password_Register.CustomValidation.validityChecks = passwordValidityChecks;

PasswordRepeat_Register.CustomValidation = new CustomValidation(PasswordRepeat_Register);
PasswordRepeat_Register.CustomValidation.validityChecks = passwordRepeatValidityChecks;

Email_Register.CustomValidation = new CustomValidation(Email_Register);
Email_Register.CustomValidation.validityChecks = emailValidityChecks;





/* ----------------------------

	Event Listeners

---------------------------- */

var inputs = document.querySelectorAll('input:not([type="submit"])');

//var submit = document.querySelector('input[type="submit"');
//var form = document.getElementById('registration');

function validate() {
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].CustomValidation.checkInput();
    }
}

//submit.addEventListener('click', validate);
//form.addEventListener('submit', validate);
</script>