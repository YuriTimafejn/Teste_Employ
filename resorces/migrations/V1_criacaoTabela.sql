USE AFAZERES;

CREATE TABLE IF NOT EXISTS TAREFAS (
   ID INT AUTO_INCREMENT PRIMARY KEY,
   DATA_REGISTRO DATE,
   DATA_CONCLUSAO DATE,
   DESCRICAO VARCHAR(255),
   LOCAL VARCHAR(255),
   OBSERVACAO TEXT,
   FLAG_CONCLUIDO BOOLEAN
);

SELECT * FROM `TAREFAS` WHERE 1;