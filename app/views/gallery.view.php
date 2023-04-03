<?php require('app/views/partials/head.php'); ?>

<div class="section-container">
    <h1>
        Gallery
    </h1>

    <form action="/storePicture" method="post" enctype="multipart/form-data" class="image-form">
        <label for="image" class="label-image">Choose an image
            <input type="file" name="image" id="image" required>
            <span id="imageName"></span>
        </label>

        <?php if (isset($errors['description'])) : ?>
            <p class="error-message"><?= $errors['description']; ?></p>
        <?php endif; ?>
        <input type="submit" value="Upload" class="log-button">
    </form>

    <div class="gallery-container">
        <?php foreach ($images as $image) : ?>
            <div>
                <?= '<img class="gallery-image" src="' . $image . '" alt="' . basename($image) . '">'; ?>
            </div>
        <?php endforeach ?>
    </div>

</div>

<script>
    let input = document.getElementById("image");
    let imageName = document.getElementById("imageName")

    input.addEventListener("change", () => {
        let inputImage = document.querySelector("input[type=file]").files[0];

        imageName.innerText = inputImage.name;
    })
</script>

<?php require('app/views/partials/footer.php'); ?>