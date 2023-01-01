const StudentController = require("../controllers/StudentController");
const express = require("express");
const router = express.Router();

router.get("/", (req, res) => {
    res.send("Hello Express");
});

// routing get students
router.get("/students", StudentController.index);

// routing post students
router.post("/students", StudentController.store);

// routing update students
router.put("/students/:id", StudentController.update);

// routing destroy students
router.delete("/students/:id", StudentController.destroy);

// routing detail student
router.get("/students/:id", StudentController.show);

// export
module.exports = router;