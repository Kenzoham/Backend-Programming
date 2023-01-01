const Student = require("../models/Student");

class StudentController {

    // Controller untuk menampilkan seluruh data students
    async index(req, res) {
        const students = await Student.all();

        if (students.length > 0) {
            const data = {
                message: "Menampilkan semua students",
                data: students,
            };

            return res.status(200).json(data);
        }

        const data = {
            message: "Students is empty",
        };

        return res.status(200).json(data);
    }

    // Controller untuk menambah data students
    async store(req, res) {
        const { nama, nim, email, jurusan } = req.body;

        if (!nama || !nim || !email || !jurusan) {
            const data = {
                message: "Harus memasukan semua data",
            };

            return res.status(422).json(data);
        }

        const student = await Student.create(req.body);

        const data = {
            message: "Menambahkan data student",
            data: student,
        };

        return res.status(201).json(data);
    }
    
    // Controller untuk mengupdate data students
    async update(req, res) {
        const { nama, nim, email, jurusan } = req.body;

        if (!nama || !nim || !email || !jurusan) {
            const data = {
                message: "Harus memasukan semua data",
            };

            return res.status(422).json(data);
        }

        const { id } = req.params;
        const student = await Student.find(id);

        if (student) {
            await Student.update(id, req.body);
            const data = {
                message: "Mengedit data student",
                data: student,
            };
            res.status(200).json(data);
        } else {
            const data = {
                message: `Student not found`,
            };

            res.status(404).json(data);
        }
    }

    // Controller untuk menghapus data students
    async destroy(req, res) {
        const { id } = req.params;
        const student = await Student.find(id);

        if (student) {
            await Student.delete(id);
            const data = {
                message: "Menghapus data student"
            };
            res.status(204).json(data);
        } else {
            const data = {
                message: `Student not found`
            };

            res.status(404).json(data);
        }
    }

    // Controller untuk menampilkan data students berdasarkan id
    async show(req, res) {
        const { id } = req.params;
        const student = await Student.find(id);

        if (student) {
            const data = {
                message: "Menampilkan detail student",
                data: student,
            };
            res.status(200).json(data);
        } else {
            const data = {
                message: `Student not found`,
            };

            res.status(404).json(data);
        }
    }
}

const object = new StudentController();

// export
module.exports = object;