<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Todo - TaskFlow</title>
    <link href="/assets/vendor/bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet" />
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
            margin-bottom: 2.5rem;
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
        
        .btn-back {
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
            text-decoration: none;
        }
        
        .btn-back:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
            color: var(--primary);
        }
        
        /* Detail Container */
        .detail-wrapper {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 1rem 2.5rem;
            animation: fadeInUp 0.5s ease;
        }
        
        .detail-card {
            background: white;
            border-radius: 24px;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
        }
        
        /* Header Section */
        .detail-header {
            background: linear-gradient(135deg, var(--primary) 0%, #7b68ff 100%);
            padding: 3rem 2.5rem 2rem;
            position: relative;
            overflow: hidden;
        }
        
        .detail-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        
        .detail-header::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -5%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite reverse;
        }
        
        .header-content {
            position: relative;
            z-index: 2;
        }
        
        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .page-badge {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            backdrop-filter: blur(10px);
        }
        
        .status-badge-header {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            padding: 0.65rem 1.5rem;
            border-radius: 50px;
            font-size: 0.95rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .todo-title-main {
            font-size: 2.5rem;
            font-weight: 800;
            color: white;
            line-height: 1.3;
            margin: 0;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }
        
        /* Content Section */
        .detail-content {
            padding: 2.5rem;
        }
        
        .section {
            margin-bottom: 2.5rem;
        }
        
        .section-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .section-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-light) 0%, #e0dcff 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.1rem;
        }
        
        .description-box {
            background: linear-gradient(135deg, var(--light) 0%, #ffffff 100%);
            border-left: 4px solid var(--primary);
            border-radius: 16px;
            padding: 1.75rem;
            font-size: 1.125rem;
            line-height: 1.8;
            color: var(--gray);
            box-shadow: var(--shadow-sm);
        }
        
        /* Meta Grid */
        .meta-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.25rem;
        }
        
        .meta-card {
            background: linear-gradient(135deg, #ffffff 0%, var(--light) 100%);
            border: 2px solid var(--gray-light);
            border-radius: 16px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .meta-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, var(--primary) 0%, var(--secondary) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .meta-card:hover {
            border-color: var(--primary);
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
        }
        
        .meta-card:hover::before {
            opacity: 1;
        }
        
        .meta-label {
            font-size: 0.875rem;
            color: var(--gray);
            font-weight: 600;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .meta-value {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--dark);
        }
        
        .status-value {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 700;
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
        
        /* Action Buttons */
        .action-section {
            padding: 2rem 2.5rem;
            background: var(--light);
            border-top: 2px solid var(--gray-light);
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .btn-action-primary {
            background: linear-gradient(135deg, var(--primary) 0%, #7b68ff 100%);
            color: white;
            border: none;
            padding: 0.875rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }
        
        .btn-action-primary:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
            color: white;
        }
        
        .btn-action-secondary {
            background: white;
            color: var(--gray);
            border: 2px solid var(--gray-light);
            padding: 0.875rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }
        
        .btn-action-secondary:hover {
            border-color: var(--primary);
            color: var(--primary);
            transform: translateY(-2px);
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
        }
        
        .empty-icon {
            font-size: 5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
            opacity: 0.3;
            animation: float 3s ease-in-out infinite;
        }
        
        .empty-state h3 {
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
            
            .btn-back {
                padding: 0.6rem 1.25rem;
                font-size: 0.875rem;
            }
            
            .detail-header {
                padding: 2rem 1.5rem 1.5rem;
            }
            
            .header-top {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .todo-title-main {
                font-size: 1.75rem;
            }
            
            .detail-content {
                padding: 1.5rem;
            }
            
            .meta-grid {
                grid-template-columns: 1fr;
            }
            
            .action-section {
                padding: 1.5rem;
                flex-direction: column;
            }
            
            .btn-action-primary,
            .btn-action-secondary {
                width: 100%;
                justify-content: center;
            }
        }
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
            <a href="index.php" class="btn-back">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </nav>

    <!-- Detail Content -->
    <div class="detail-wrapper">
        <?php if ($todo): ?>
            <div class="detail-card">
                <!-- Header Section -->
                <div class="detail-header">
                    <div class="header-content">
                        <div class="header-top">
                            <div class="page-badge">
                                <i class="fas fa-info-circle"></i>
                                Detail Todo
                            </div>
                            <div class="status-badge-header">
                                <?php if ($todo['is_finished'] === 't'): ?>
                                    <i class="fas fa-check-double"></i>
                                    Selesai
                                <?php else: ?>
                                    <i class="fas fa-clock"></i>
                                    Belum Selesai
                                <?php endif; ?>
                            </div>
                        </div>
                        <h1 class="todo-title-main">
                            <?= htmlspecialchars($todo['title']) ?>
                        </h1>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="detail-content">
                    <!-- Description Section -->
                    <div class="section">
                        <h2 class="section-title">
                            <span class="section-icon">
                                <i class="fas fa-align-left"></i>
                            </span>
                            Deskripsi
                        </h2>
                        <div class="description-box">
                            <?= nl2br(htmlspecialchars($todo['description'] ?: 'Tidak ada deskripsi untuk todo ini.')) ?>
                        </div>
                    </div>

                    <!-- Information Section -->
                    <div class="section">
                        <h2 class="section-title">
                            <span class="section-icon">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            Informasi Detail
                        </h2>
                        <div class="meta-grid">
                            <div class="meta-card">
                                <div class="meta-label">
                                    <i class="far fa-calendar-plus"></i>
                                    Dibuat Pada
                                </div>
                                <div class="meta-value">
                                    <?= date('d F Y', strtotime($todo['created_at'])) ?>
                                </div>
                                <div class="text-muted small mt-1">
                                    <?= date('H:i', strtotime($todo['created_at'])) ?> WIB
                                </div>
                            </div>

                            <div class="meta-card">
                                <div class="meta-label">
                                    <i class="far fa-calendar-check"></i>
                                    Terakhir Diupdate
                                </div>
                                <div class="meta-value">
                                    <?= date('d F Y', strtotime($todo['updated_at'])) ?>
                                </div>
                                <div class="text-muted small mt-1">
                                    <?= date('H:i', strtotime($todo['updated_at'])) ?> WIB
                                </div>
                            </div>

                            <div class="meta-card">
                                <div class="meta-label">
                                    <i class="fas fa-flag"></i>
                                    Status Todo
                                </div>
                                <div class="meta-value">
                                    <span class="status-value <?= $todo['is_finished'] === 't' ? 'status-completed' : 'status-pending' ?>">
                                        <i class="fas <?= $todo['is_finished'] === 't' ? 'fa-check-double' : 'fa-clock' ?>"></i>
                                        <?= $todo['is_finished'] === 't' ? 'Selesai' : 'Belum Selesai' ?>
                                    </span>
                                </div>
                            </div>

                            <div class="meta-card">
                                <div class="meta-label">
                                    <i class="far fa-clock"></i>
                                    Durasi Pengerjaan
                                </div>
                                <div class="meta-value">
                                    <?php
                                    $created = new DateTime($todo['created_at']);
                                    $updated = new DateTime($todo['updated_at']);
                                    $interval = $created->diff($updated);
                                    
                                    $duration = [];
                                    if ($interval->d > 0) $duration[] = $interval->d . ' hari';
                                    if ($interval->h > 0) $duration[] = $interval->h . ' jam';
                                    if ($interval->i > 0) $duration[] = $interval->i . ' menit';
                                    
                                    echo !empty($duration) ? implode(', ', $duration) : 'Baru dibuat';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Section -->
                <div class="action-section">
                    <a href="index.php" class="btn-action-primary">
                        <i class="fas fa-list"></i>
                        Lihat Semua Todo
                    </a>
                    <a href="index.php" class="btn-action-secondary">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                </div>
            </div>

        <?php else: ?>
            <!-- Empty State -->
            <div class="detail-card">
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-search-minus"></i>
                    </div>
                    <h3>Todo Tidak Ditemukan</h3>
                    <p>Todo yang Anda cari tidak ditemukan atau mungkin telah dihapus.</p>
                    <a href="index.php" class="btn-action-primary">
                        <i class="fas fa-arrow-left"></i>
                        Kembali ke Daftar Todo
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script src="/assets/vendor/bootstrap-5.3.8-dist/js/bootstrap.min.js"></script>
</body>
</html>