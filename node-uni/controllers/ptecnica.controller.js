import { request } from "express"
import { pool } from "../db.js"

export const estudio = async (req,res) => {
    const [result] = await pool.query('SELECT * FROM `Estudio`')
    res.json(result)
}

export const profesor = async (req,res) => {
    const [result] = await pool.query('SELECT * FROM `Profesor`')
    res.json(result)
}

export const profesoresAsignaturas = async (req,res) => {
    const [result] = await pool.query('SELECT * FROM `Profesor-Asignatura`')
    res.json(result)
}

export const asignatura = async (req,res) => {
    const [result] = await pool.query('SELECT * FROM `Asignatura` WHERE idEstudio=?', [req.params.id])
    if (result.length <= 0) return res.status(404).json({
        message: 'no hay información'
    })
    res.json(result)
}

