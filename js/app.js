function loadProduk() {
    fetch("list.php")
      .then(res => res.json())
      .then(data => {
        const tbody = document.getElementById("produkBody");
        tbody.innerHTML = "";
        data.forEach(p => {
          tbody.innerHTML += `
            <tr>
              <td>${p.id}</td>
              <td>${p.nama}</td>
              <td>Rp ${p.harga}</td>
              <td>${p.deskripsi}</td>
              <td>
                <button onclick="editProduk(${p.id})">Edit</button>
                <button onclick="hapusProduk(${p.id})">Hapus</button>
              </td>
            </tr>`;
        });
      });
  }
  
  function editProduk(id) {
    fetch("detail.php?id=" + id)
      .then(res => res.json())
      .then(p => {
        document.getElementById("produkId").value = p.id;
        document.getElementById("nama").value = p.nama;
        document.getElementById("harga").value = p.harga;
        document.getElementById("deskripsi").value = p.deskripsi;
        document.getElementById("formTitle").innerText = "Edit Produk";
      });
  }
  
  document.getElementById("formProduk").addEventListener("submit", function(e) {
    e.preventDefault();
  
    const id = document.getElementById("produkId").value;
    const data = {
      nama: document.getElementById("nama").value,
      harga: document.getElementById("harga").value,
      deskripsi: document.getElementById("deskripsi").value
    };
  
    let url = "create.php";
    let method = "POST";
  
    if (id) {
      url = "update.php?id=" + id;
    }
  
    fetch(url, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(response => {
      alert(response.status || response.error);
      loadProduk();
      this.reset();
      document.getElementById("produkId").value = "";
      document.getElementById("formTitle").innerText = "Tambah Produk";
    });
  });
  
  function hapusProduk(id) {
    if (confirm("Hapus produk ini?")) {
      fetch("delete.php?id=" + id, { method: "POST" })
        .then(res => res.json())
        .then(response => {
          alert(response.status || response.error);
          loadProduk();
        });
    }
  }
  function resetForm() {
    document.getElementById("formProduk").reset();
    document.getElementById("produkId").value = "";
    document.getElementById("formTitle").innerText = "Tambah Produk";
  }
  
  