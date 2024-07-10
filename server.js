// server.js

const express = require('express');
const bodyParser = require('body-parser');
const mongoose = require('mongoose');
const bcrypt = require('bcrypt');
const cors = require('cors');

const app = express();
app.use(bodyParser.json());
app.use(cors());

mongoose.connect('mongodb://localhost:27017/your_database', {
    useNewUrlParser: true,
    useUnifiedTopology: true
});

const userSchema = new mongoose.Schema({
    email: { type: String, unique: true },
    password: String,
    parent_name: String,
    parent_phone: String,
    student_name: String,
    class: String,
    school: String,
    address: String
});

const User = mongoose.model('User', userSchema);

app.post('/register', async (req, res) => {
    const { email, password, parent_name, parent_phone, student_name, class, school, address } = req.body;

    // Kiểm tra email đã tồn tại
    const existingUser = await User.findOne({ email });
    if (existingUser) {
        return res.json({ success: false, message: 'Email đã tồn tại' });
    }

    // Mã hóa mật khẩu
    const hashedPassword = await bcrypt.hash(password, 10);

    // Tạo người dùng mới
    const newUser = new User({
        email,
        password: hashedPassword,
        parent_name,
        parent_phone,
        student_name,
        class,
        school,
        address
    });

    try {
        await newUser.save();
        res.json({ success: true, message: 'Đăng ký thành công' });
    } catch (error) {
        res.json({ success: false, message: 'Đăng ký thất bại', error });
    }
});

app.post('/login', async (req, res) => {
    const { username, password } = req.body;
    const user = await User.findOne({ username });

    if (user && await bcrypt.compare(password, user.password)) {
        res.json({ success: true, message: 'Đăng nhập thành công' });
    } else {
        res.json({ success: false, message: 'Tên đăng nhập hoặc mật khẩu không đúng' });
    }
});

app.listen(3000, () => {
    console.log('Server is running on port 3000');
});
// JavaScript Document