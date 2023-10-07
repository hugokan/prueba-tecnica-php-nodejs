import {createPool} from 'mysql2/promise';

export const pool = createPool({
    host: 'localhost',
    user: 'root',
    password: 'root',
    port: 8889,
    database: 'universidad_db'
})