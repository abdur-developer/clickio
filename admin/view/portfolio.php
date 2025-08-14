<?php
    $id = isset($_GET['id']) ? decryptSt($_GET['id']) : null;
    if($id != null){
        $sql = "SELECT * FROM portfolio WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }else{
        $row = [
            'id' => null,
            'type' => null,
            'description' => null,
            'img' => null,
            'title' => null
        ];
    }
?>

<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-gradient-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Post Details</h4>
                <a href="javascript:history.back()" class="btn btn-light btn-sm">
                    <i class="fas fa-arrow-left me-1"></i> Back
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <!-- <php if ($result->num_rows > 0): ?> -->
            <form action="action/update_portfolio.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
                
                <div class="row g-4">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <!-- Title -->
                        <div class="form-floating mb-4">
                            <input type="text" name="title" class="form-control" id="title" 
                                   value="<?= htmlspecialchars($row['title']) ?>" required>
                            <label for="title"><i class="fas fa-heading me-1 text-muted"></i>Title</label>
                            <div class="invalid-feedback">Please provide a title</div>
                        </div>
                        
                        <!-- Image Upload -->
                        <div class="mb-4">
                            <label class="form-label"><i class="fas fa-image me-1 text-muted"></i>Post Image</label>
                            <?php if (!empty($row['img'])): ?>
                                <div class="mb-3 text-center">
                                    <img src="upload/<?= htmlspecialchars($row['img']) ?>" alt="Current Image" 
                                         class="img-thumbnail rounded" style="max-height: 200px;">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" name="remove_img" id="remove_img">
                                        <label class="form-check-label text-danger" for="remove_img">
                                            Remove current image
                                        </label>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <input type="file" name="img" class="form-control" accept="image/*">
                            <small class="text-muted">Max size: 2MB (JPEG, PNG)</small>
                        </div>
                    </div>
                    
                    <!-- Right Column -->
                    <div class="col-md-6">
                        
                        <!-- Type -->
                        <div class="form-floating mb-4">
                            <select name="type" class="form-control" id="type">
                                <option value="0" <?= $row['type'] === '0' ? 'selected' : '' ?>>Website</option>
                                <option value="1" <?= $row['type'] === '1' ? 'selected' : '' ?>>App</option>
                                <option value="2" <?= $row['type'] === '2' ? 'selected' : '' ?>>Graphics</option>
                            </select>
                            <label for="type"><i class="fas fa-calendar-alt me-1 text-muted"></i>Type</label>
                        </div>
                        
                        <!-- Description -->
                        <div class="form-floating mb-4">
                            <input type="text" name="description" class="form-control" id="description" 
                                   value="<?= htmlspecialchars($row['description']) ?>">
                            <label for="description"><i class="fas fa-users me-1 text-muted"></i>Description</label>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <button type="reset" class="btn btn-outline-secondary">
                        <i class="fas fa-undo me-1"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary px-4" id="submit-btn">
                        <i class="fas fa-save me-1"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Quill JS -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
// Initialize Quill Editor
const quill = new Quill('#quill-editor', {
    theme: 'snow',
    modules: {
        toolbar: [
            [{ 'header': [1, 2, 3, false] }],
            [{ 'align': [] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            ['link']
        ]
    },
    placeholder: 'Write detailed text here...'
});

// Set initial content from database
quill.root.innerHTML = `<?= $row['description'] ?>`;

// Form submission handler
document.querySelector('form').addEventListener('submit', function(e) {
    // Get HTML content from Quill and put it in hidden input
    const quillHtml = document.getElementById('quill-html');
    quillHtml.value = quill.root.innerHTML;
    
    // Basic form validation
    if (!this.checkValidity()) {
        e.preventDefault();
        e.stopPropagation();
    }
    this.classList.add('was-validated');
});

// Form validation
(() => {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})();
</script>