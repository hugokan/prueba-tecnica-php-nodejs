import { Router } from "express";
import { asignatura, estudio, profesor, profesoresAsignaturas } from "../controllers/ptecnica.controller.js";

const router = Router();

router.get('/estudios', estudio);
router.get('/profesores', profesor);
router.get('/profesoresAsignaturas', profesoresAsignaturas);
router.get('/asignaturas/:id', asignatura);

export default router;