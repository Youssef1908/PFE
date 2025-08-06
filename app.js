const languageButtons = document.querySelectorAll('.language-button');
const resultMessage = document.getElementById('result-message');

languageButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        const selectedLanguage = event.target.dataset.lang;
        let response;
        switch (selectedLanguage) {
            case 'English':
                response = "You've chosen English as your language, please authenticate yourself:";
                break;
            case 'Arabic':
                response = "لقد اخترت اللغة العربية، يرجى التحقق من هويتك:";
                break;
            case 'French':
                response = "Vous avez choisi le Français comme langue, veuillez vous authentifier s'il vous plaît:";
                break;
            default:
                response = "Invalid language selection";
        }
        resultMessage.innerText = response;
        resultMessage.style.display = 'block';
    });
});