<!-- Add houseId and wandId fields -->
<form id="registerForm">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="number" name="houseId" placeholder="House ID" required>
    <input type="number" name="wandId" placeholder="Wand ID" required>
    <button type="submit">Register</button>
</form>

<script>
    document.getElementById('registerForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const response = await fetch('/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                name: formData.get('name'),
                email: formData.get('email'),
                password: formData.get('password'),
                houseId: parseInt(formData.get('houseId')),
                wandId: parseInt(formData.get('wandId'))
            })
        });
        // ... rest of the script
    });
</script>