import {callAjaxPost} from './formSubmit';

let taskForm = document.querySelector('.js-form');
let messageDiv = document.querySelector('.js-message');

taskForm.onsubmit = (e) => {
    e.preventDefault();

    const formData = new FormData(taskForm);

    taskForm.classList.add('wait');
    callAjaxPost(
        taskForm.getAttribute('action'),
        Object.fromEntries(formData.entries()),
        function (response) {
            if (response.success) {
                messageDiv.classList.remove('text-danger');
                messageDiv.classList.add('text-success');
                messageDiv.innerHTML = 'Data successfully sent';
                taskForm.style.display = 'none';
            } else {
                messageDiv.classList.remove('text-success');
                messageDiv.classList.add('text-danger');
                messageDiv.innerHTML = response.messages.join('<br>');
                messageDiv.style.display = 'block';
            }

            taskForm.classList.remove('wait');
        }
    );

};
