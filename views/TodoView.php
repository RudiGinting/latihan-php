<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Aplikasi Todolist Premium</title>
    <link href="/assets/vendor/bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        
        :root {
            --primary: #5a4ff2;
            --primary-dark: #4a3fd2;
            --primary-light: #f0eeff;
            --secondary: #ff6b9d;
            --success: #00d4aa;
            --warning: #ffa726;
            --danger: #ff5252;
            --dark: #1a1a2e;
            --light: #f8f9ff;
            --gray: #6b7280;
            --gray-light: #e5e7eb;
            --shadow-sm: 0 2px 8px rgba(90, 79, 242, 0.08);
            --shadow-md: 0 4px 16px rgba(90, 79, 242, 0.12);
            --shadow-lg: 0 8px 32px rgba(90, 79, 242, 0.16);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #f8f9ff 0%, #e8ecff 100%);
            color: var(--dark);
            min-height: 100vh;
            line-height: 1.6;
        }
        
        /* Navbar Premium */
        .navbar-premium {
            background: linear-gradient(135deg, var(--primary) 0%, #7b68ff 100%);
            box-shadow: var(--shadow-lg);
            padding: 1.25rem 0;
            backdrop-filter: blur(10px);
        }
        
        .navbar-brand {
            font-size: 1.75rem;
            font-weight: 800;
            color: white !important;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: transform 0.3s ease;
        }
        
        .navbar-brand:hover {
            transform: translateY(-2px);
        }
        
        .brand-icon {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.5rem;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-add-todo {
            background: white;
            color: var(--primary);
            font-weight: 600;
            padding: 0.75rem 1.75rem;
            border-radius: 50px;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-add-todo:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
            color: var(--primary);
        }
        
        /* Container */
        .app-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2.5rem 1rem;
        }
        
        /* Search & Filter Section */
        .filter-wrapper {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-md);
            animation: fadeInUp 0.5s ease;
        }
        
        .search-box {
            position: relative;
        }
        
        .search-icon {
            position: absolute;
            left: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            font-size: 1.1rem;
        }
        
        .form-control-modern {
            border: 2px solid var(--gray-light);
            border-radius: 15px;
            padding: 1rem 1rem 1rem 3.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--light);
        }
        
        .form-control-modern:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(90, 79, 242, 0.1);
            background: white;
        }
        
        .form-select-modern {
            border: 2px solid var(--gray-light);
            border-radius: 15px;
            padding: 1rem 1.25rem;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            background: var(--light);
            cursor: pointer;
        }
        
        .form-select-modern:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(90, 79, 242, 0.1);
            background: white;
        }
        
        .btn-search {
            background: linear-gradient(135deg, var(--primary) 0%, #7b68ff 100%);
            color: white;
            border: none;
            border-radius: 15px;
            padding: 1rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-search:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }
        
        .btn-reset {
            border: 2px solid var(--danger);
            color: var(--danger);
            background: white;
            border-radius: 12px;
            padding: 0.5rem 1.25rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-reset:hover {
            background: var(--danger);
            color: white;
            transform: translateY(-2px);
        }
        
        /* Alert Messages */
        .alert-modern {
            border-radius: 15px;
            border: none;
            padding: 1.25rem 1.5rem;
            margin-bottom: 1.5rem;
            animation: slideInRight 0.5s ease;
            display: flex;
            align-items: center;
            gap: 1rem;
            font-weight: 500;
        }
        
        .alert-success {
            background: linear-gradient(135deg, #d4ffec 0%, #b7ffdb 100%);
            color: #00875a;
        }
        
        .alert-danger {
            background: linear-gradient(135deg, #ffe0e0 0%, #ffcbcb 100%);
            color: #c41e3a;
        }
        
        /* Todo Cards */
        .todo-grid {
            display: grid;
            gap: 1.5rem;
        }
        
        .todo-card {
            background: white;
            border-radius: 20px;
            padding: 1.75rem;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
            cursor: move;
            animation: fadeInUp 0.5s ease;
            animation-fill-mode: both;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }
        
        .todo-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .todo-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary);
        }
        
        .todo-card:hover::before {
            opacity: 1;
        }
        
        .todo-card.sortable-ghost {
            opacity: 0.4;
            background: var(--light);
        }
        
        .todo-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        
        .todo-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex: 1;
            line-height: 1.4;
        }
        
        .todo-check-icon {
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .todo-check-icon.completed {
            color: var(--success);
            animation: scaleIn 0.3s ease;
        }
        
        .todo-check-icon.pending {
            color: var(--gray-light);
        }
        
        .todo-description {
            color: var(--gray);
            margin: 1rem 0;
            line-height: 1.7;
            font-size: 1rem;
        }
        
        .todo-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.25rem;
            padding-top: 1.25rem;
            border-top: 1px solid var(--gray-light);
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .todo-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        /* Status Badge Premium */
        .status-badge {
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-completed {
            background: linear-gradient(135deg, #d4ffec 0%, #a3f7d4 100%);
            color: #00875a;
        }
        
        .status-pending {
            background: linear-gradient(135deg, #fff4e6 0%, #ffe4b8 100%);
            color: #ff8c00;
        }
        
        .todo-date {
            color: var(--gray);
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
        }
        
        /* Action Buttons Premium */
        .action-group {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-action {
            padding: 0.6rem 1.25rem;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }
        
        .btn-detail {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            color: #1976d2;
        }
        
        .btn-detail:hover {
            background: linear-gradient(135deg, #bbdefb 0%, #90caf9 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(25, 118, 210, 0.3);
        }
        
        .btn-edit {
            background: linear-gradient(135deg, #fff9e6 0%, #fff3cc 100%);
            color: #f57c00;
        }
        
        .btn-edit:hover {
            background: linear-gradient(135deg, #fff3cc 0%, #ffe699 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(245, 124, 0, 0.3);
        }
        
        .btn-delete {
            background: linear-gradient(135deg, #ffebee 0%, #ffcdd2 100%);
            color: #d32f2f;
        }
        
        .btn-delete:hover {
            background: linear-gradient(135deg, #ffcdd2 0%, #ef9a9a 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(211, 47, 47, 0.3);
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
            background: white;
            border-radius: 20px;
            box-shadow: var(--shadow-sm);
        }
        
        .empty-icon {
            font-size: 5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
            opacity: 0.3;
            animation: float 3s ease-in-out infinite;
        }
        
        .empty-state h4 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.75rem;
        }
        
        .empty-state p {
            color: var(--gray);
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }
        
        /* Modal Premium */
        .modal-content {
            border-radius: 24px;
            border: none;
            box-shadow: var(--shadow-lg);
        }
        
        .modal-header {
            background: linear-gradient(135deg, var(--primary) 0%, #7b68ff 100%);
            color: white;
            border-radius: 24px 24px 0 0;
            padding: 1.75rem 2rem;
            border: none;
        }
        
        .modal-title {
            font-weight: 700;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .modal-body {
            padding: 2rem;
        }
        
        .modal-footer {
            padding: 1.5rem 2rem;
            border: none;
            background: var(--light);
            border-radius: 0 0 24px 24px;
        }
        
        .btn-modal-primary {
            background: linear-gradient(135deg, var(--primary) 0%, #7b68ff 100%);
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-modal-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }
        
        .btn-modal-secondary {
            background: white;
            border: 2px solid var(--gray-light);
            color: var(--gray);
            padding: 0.75rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-modal-secondary:hover {
            border-color: var(--primary);
            color: var(--primary);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes scaleIn {
            from {
                transform: scale(0);
            }
            to {
                transform: scale(1);
            }
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.35rem;
            }
            
            .btn-add-todo {
                padding: 0.6rem 1.25rem;
                font-size: 0.875rem;
            }
            
            .filter-wrapper {
                padding: 1.5rem;
            }
            
            .todo-card {
                padding: 1.25rem;
            }
            
            .todo-title {
                font-size: 1.15rem;
            }
            
            .todo-footer {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .action-group {
                width: 100%;
                justify-content: flex-end;
            }
        }
        
        /* Stagger animation for todo cards */
        <?php if (!empty($todos)): ?>
            <?php foreach ($todos as $i => $todo): ?>
                .todo-card:nth-child(<?= $i + 1 ?>) {
                    animation-delay: <?= $i * 0.1 ?>s;
                }
            <?php endforeach; ?>
        <?php endif; ?>
    </style>
</head>
<body>
    <!-- Navbar Premium -->
    <nav class="navbar navbar-premium">
        <div class="container-fluid" style="max-width: 1200px; margin: 0 auto;">
            <a class="navbar-brand" href="index.php">
                <span class="brand-icon">
                    <i class="fas fa-check-double"></i>
                </span>
                TaskFlow
            </a>
            <button class="btn-add-todo" data-bs-toggle="modal" data-bs-target="#addTodo">
                <i class="fas fa-plus-circle"></i>
                Tambah Todo
            </button>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="app-wrapper">
        <!-- Search & Filter Section -->
        <div class="filter-wrapper">
            <form method="GET" class="row g-3 align-items-end">
                <input type="hidden" name="page" value="index">
                
                <div class="col-md-4">
                    <label class="form-label">
                        <i class="fas fa-filter me-2"></i>Filter Status
                    </label>
                    <select name="filter" class="form-select form-select-modern" onchange="this.form.submit()">
                        <option value="all" <?= ($_GET['filter'] ?? 'all') === 'all' ? 'selected' : '' ?>>
                            Semua Todo
                        </option>
                        <option value="finished" <?= ($_GET['filter'] ?? '') === 'finished' ? 'selected' : '' ?>>
                            Selesai
                        </option>
                        <option value="unfinished" <?= ($_GET['filter'] ?? '') === 'unfinished' ? 'selected' : '' ?>>
                            Belum Selesai
                        </option>
                    </select>
                </div>
                
                <div class="col-md-5">
                    <label class="form-label">
                        <i class="fas fa-search me-2"></i>Cari Todo
                    </label>
                    <div class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" name="search" class="form-control form-control-modern" 
                               placeholder="Cari berdasarkan judul atau deskripsi..." 
                               value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                    </div>
                </div>
                
                <div class="col-md-3">
                    <button type="submit" class="btn btn-search w-100">
                        <i class="fas fa-search me-2"></i>Cari
                    </button>
                </div>
                
                <?php if (isset($_GET['search']) || (isset($_GET['filter']) && $_GET['filter'] !== 'all')): ?>
                    <div class="col-12">
                        <a href="index.php" class="btn btn-reset">
                            <i class="fas fa-times me-2"></i>Reset Filter
                        </a>
                    </div>
                <?php endif; ?>
            </form>
        </div>

        <!-- Alert Messages -->
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert-modern alert-danger">
                <i class="fas fa-exclamation-circle fa-lg"></i>
                <div><?= $_SESSION['error'] ?></div>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert-modern alert-success">
                <i class="fas fa-check-circle fa-lg"></i>
                <div><?= $_SESSION['success'] ?></div>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <!-- Todo Grid -->
        <div id="todoList" class="todo-grid">
            <?php if (!empty($todos)): ?>
                <?php foreach ($todos as $i => $todo): ?>
                <div class="todo-card" data-id="<?= $todo['id'] ?>">
                    <div class="todo-header">
                        <div class="todo-title">
                            <i class="fas fa-check-circle todo-check-icon <?= $todo['is_finished'] === 't' ? 'completed' : 'pending' ?>"></i>
                            <?= htmlspecialchars($todo['title']) ?>
                        </div>
                    </div>
                    
                    <div class="todo-description">
                        <?= htmlspecialchars($todo['description']) ?>
                    </div>
                    
                    <div class="todo-footer">
                        <div class="todo-meta">
                            <span class="status-badge <?= $todo['is_finished'] === 't' ? 'status-completed' : 'status-pending' ?>">
                                <i class="fas <?= $todo['is_finished'] === 't' ? 'fa-check-double' : 'fa-clock' ?>"></i>
                                <?= $todo['is_finished'] === 't' ? 'Selesai' : 'Belum Selesai' ?>
                            </span>
                            <span class="todo-date">
                                <i class="far fa-calendar-alt"></i>
                                <?= date('d M Y, H:i', strtotime($todo['created_at'])) ?>
                            </span>
                        </div>
                        
                        <div class="action-group">
                            <a href="?page=detail&id=<?= $todo['id'] ?>" class="btn-action btn-detail">
                                <i class="fas fa-eye"></i>
                                Detail
                            </a>
                            <button class="btn-action btn-edit" 
                                    onclick="showModalEditTodo(<?= $todo['id'] ?>, '<?= htmlspecialchars(addslashes($todo['title'])) ?>', '<?= htmlspecialchars(addslashes($todo['description'])) ?>', <?= $todo['is_finished'] === 't' ? 'true' : 'false' ?>)">
                                <i class="fas fa-edit"></i>
                                Ubah
                            </button>
                            <button class="btn-action btn-delete" 
                                    onclick="showModalDeleteTodo(<?= $todo['id'] ?>, '<?= htmlspecialchars(addslashes($todo['title'])) ?>')">
                                <i class="fas fa-trash-alt"></i>
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <h4>Belum Ada Todo</h4>
                    <p>Mulai produktivitas Anda dengan membuat todo pertama!</p>
                    <button class="btn-add-todo" data-bs-toggle="modal" data-bs-target="#addTodo">
                        <i class="fas fa-plus-circle"></i>
                        Tambah Todo Pertama
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- MODAL ADD TODO -->
    <div class="modal fade" id="addTodo" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plus-circle"></i>
                        Tambah Todo Baru
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="?page=create" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="inputTitle" class="form-label">Judul Todo</label>
                            <input type="text" name="title" class="form-control form-control-modern" id="inputTitle" 
                                   placeholder="Masukkan judul todo" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputDescription" class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control form-control-modern" id="inputDescription" 
                                      rows="4" placeholder="Tambahkan deskripsi (opsional)"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-modal-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-modal-primary">
                            <i class="fas fa-save me-2"></i>Simpan Todo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT TODO -->
    <div class="modal fade" id="editTodo" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-edit"></i>
                        Edit Todo
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="?page=update" method="POST">
                    <input name="id" type="hidden" id="inputEditTodoId">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="inputEditTitle" class="form-label">Judul Todo</label>
                            <input type="text" name="title" class="form-control form-control-modern" id="inputEditTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputEditDescription" class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control form-control-modern" id="inputEditDescription" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="inputEditStatus" class="form-label">Status</label>
                            <select name="is_finished" class="form-select form-select-modern" id="inputEditStatus">
                                <option value="0">Belum Selesai</option>
                                <option value="1">Selesai</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-modal-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-modal-primary">
                            <i class="fas fa-save me-2"></i>Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL DELETE TODO -->
    <div class="modal fade" id="deleteTodo" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(135deg, #ff5252 0%, #ff6b9d 100%);">
                    <h5 class="modal-title">
                        <i class="fas fa-exclamation-triangle"></i>
                        Hapus Todo
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <div style="font-size: 4rem; color: var(--danger); margin-bottom: 1.5rem;">
                        <i class="fas fa-trash-alt"></i>
                    </div>
                    <h5 class="mb-3">Anda yakin ingin menghapus todo ini?</h5>
                    <p class="text-muted mb-2">Todo yang akan dihapus:</p>
                    <p class="fw-bold text-danger fs-5" id="deleteTodoTitle"></p>
                    <p class="text-muted small">Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-modal-secondary" data-bs-dismiss="modal">Batal</button>
                    <a id="btnDeleteTodo" class="btn btn-modal-primary" style="background: linear-gradient(135deg, #ff5252 0%, #ff6b9d 100%);">
                        <i class="fas fa-trash me-2"></i>Ya, Hapus
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/vendor/bootstrap-5.3.8-dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
    <script>
        // Modal Functions
        function showModalEditTodo(todoId, title, description, isFinished) {
            document.getElementById("inputEditTodoId").value = todoId;
            document.getElementById("inputEditTitle").value = title;
            document.getElementById("inputEditDescription").value = description;
            
            const statusSelect = document.getElementById("inputEditStatus");
            statusSelect.value = isFinished ? "1" : "0";
            
            var myModal = new bootstrap.Modal(document.getElementById("editTodo"));
            myModal.show();
        }

        function showModalDeleteTodo(todoId, title) {
            document.getElementById("deleteTodoTitle").innerText = title;
            document.getElementById("btnDeleteTodo").setAttribute("href", `?page=delete&id=${todoId}`);
            var myModal = new bootstrap.Modal(document.getElementById("deleteTodo"));
            myModal.show();
        }

        // Drag and Drop Sorting
        document.addEventListener('DOMContentLoaded', function() {
            const todoList = document.getElementById('todoList');
            
            if (todoList && todoList.children.length > 0 && !todoList.querySelector('.empty-state')) {
                new Sortable(todoList, {
                    animation: 200,
                    ghostClass: 'sortable-ghost',
                    easing: 'cubic-bezier(0.4, 0, 0.2, 1)',
                    onEnd: function(evt) {
                        const todoItems = Array.from(todoList.querySelectorAll('.todo-card'));
                        const todoIds = todoItems.map(item => item.getAttribute('data-id'));
                        
                        // Simpan urutan ke server
                        fetch('?page=updateSort', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({ todos: todoIds })
                        });
                    }
                });
            }
            
            // Auto dismiss alerts after 5 seconds
            const alerts = document.querySelectorAll('.alert-modern');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.animation = 'slideInRight 0.5s ease reverse';
                    setTimeout(() => alert.remove(), 500);
                }, 5000);
            });
        });
    </script>
</body>
</html>