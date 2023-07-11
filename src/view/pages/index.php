<?php
/**
 * @var array $errors
 * @var string $error
 */
?>
<form name="Feedback" method="post" enctype="multipart/form-data">
<div class="container text-center">
    <div class="card" style="width: 50%;">
        <div class="card-body">
            <div class="mb-3">
                <?php if($error): ?>
                <label for="exampleFormControlInput1" class="form-label">Внимаение!!</label>
                <pre>
                    <?= $error ?>
                </pre>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Имя пользователя *</label>
                <input name="nickname" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ваше имя" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email *</label>
                <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Сообщение *</label>
                <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Файл</label>
                <input name="uploadedFile" class="form-control" type="file" id="formFile">
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </div>
    </div>
</div>
</form>

