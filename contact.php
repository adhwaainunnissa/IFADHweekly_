<?php
$page_title = "Hubungi Kami - Web Informatika";
require 'header.php';
?>

<div class="card form-card">
    <h3 class="card-title">Hubungi Kami</h3>
    <p style="color: var(--text-muted); margin-bottom: 25px; font-size: 0.95rem;">
        Silakan isi formulir di bawah ini untuk mengirimkan pertanyaan, masukan, atau kendala terkait sistem informasi akademik kami.
    </p>
    
    <form action="" method="post" onsubmit="event.preventDefault(); alert('Terima kasih! Pesan Anda telah terkirim (Simulasi).');">
        <div class="form-group">
            <label for="contact_name" class="form-label">Nama Lengkap</label>
            <input type="text" id="contact_name" name="name" class="form-control" placeholder="Masukkan nama lengkap Anda" required />
        </div>
        
        <div class="form-group">
            <label for="contact_email" class="form-label">Alamat Email</label>
            <input type="email" id="contact_email" name="email" class="form-control" placeholder="contoh@domain.com" required />
        </div>
        
        <div class="form-group">
            <label for="contact_subject" class="form-label">Subjek Pesan</label>
            <input type="text" id="contact_subject" name="subject" class="form-control" placeholder="Pesan penting akademik / lainnya" required />
        </div>
        
        <div class="form-group">
            <label for="contact_message" class="form-label">Pesan Anda</label>
            <textarea id="contact_message" name="message" class="form-control" rows="5" placeholder="Tuliskan detail pesan Anda di sini..." required></textarea>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            <button type="reset" class="btn btn-sm" style="background-color: #f1f5f9; color: var(--text-muted);">Reset Form</button>
        </div>
    </form>
</div>

<?php
require 'footer.php';
?>