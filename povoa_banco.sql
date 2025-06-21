USE `academia_forca_total`;

-- Usuários
INSERT INTO usuario (nivel, nome, email, senha, statusRegistro) VALUES
(11, 'Administrador', 'admin@forcatotal.com', MD5('admin123'), 1),
(21, 'Carlos Silva', 'carlos@forcatotal.com', MD5('senha123'), 1),
(21, 'Mariana Souza', 'mariana@forcatotal.com', MD5('senha123'), 1);

-- Professores
INSERT INTO professores (usuario_id, nome, cpf, telefone, email, data_nascimento, especialidade, endereco) VALUES
(2, 'Carlos Silva', '12345678901', '(11) 99999-0001', 'carlos@forcatotal.com', '1985-06-20', 'Musculação', 'Rua A, 123, Centro'),
(3, 'Mariana Souza', '98765432100', '(11) 99999-0002', 'mariana@forcatotal.com', '1990-08-15', 'Cardio', 'Rua B, 456, Bairro B');

-- Planos
INSERT INTO planos (nome, valor, treinos_semanais) VALUES
('Mensal', 99.90, 3),
('Trimestral', 249.90, 4),
('Anual', 899.90, 5);

-- Usuário para aluno
INSERT INTO usuario (nivel, nome, email, senha, statusRegistro) VALUES
(21, 'João Ferreira', 'joao@forcatotal.com', MD5('123456'), 1);

-- Alunos
INSERT INTO alunos (nome, cpf, telefone, email, data_nascimento, endereco, plano_id, usuario_id) VALUES
('João Ferreira', '11122233344', '(11) 98888-7766', 'joao@forcatotal.com', '2000-03-10', 'Rua C, 789, Bairro C', 1, LAST_INSERT_ID());

-- Exercícios
INSERT INTO exercicios (nome, grupo_muscular) VALUES
('Supino Reto', 'Peito'),
('Agachamento Livre', 'Pernas'),
('Puxada Frontal', 'Costas'),
('Rosca Direta', 'Bíceps'),
('Tríceps Pulley', 'Tríceps'),
('Elevação Lateral', 'Ombros'),
('Abdominal Infra', 'Abdômen');

-- Fichas de treino
INSERT INTO fichas_treino (aluno_id, professor_id, data_inicio, validade, anotacoes) VALUES
(1, 1, '2025-06-01', '2025-08-01', 'Treino para hipertrofia 3x por semana');

-- Ficha Exercício
INSERT INTO ficha_exercicio (ficha_id, exercicio_id, series, repeticoes, carga) VALUES
(1, 1, 4, 10, 60.00),
(1, 2, 4, 12, 80.00),
(1, 3, 4, 10, 55.00);

-- Acompanhamentos
INSERT INTO acompanhamentos (ficha_id, data, peso, medidas, frequencia, observacoes) VALUES
(1, '2025-06-10', 75.5, 'Peito: 98cm; Cintura: 82cm; Coxa: 55cm', 12, 'Boa evolução nas cargas. Foco na dieta.');

-- Produtos e serviços
INSERT INTO produtos_servicos (nome, descricao, imagem, tipo, preco, unidade, estoque) VALUES
('Camisa Academia Força Total', 'Camisa DryFit personalizada', NULL, 'produto', 39.90, 'unidade', 50),
('Avaliação Física Completa', 'Análise de composição corporal com bioimpedância', NULL, 'servico', 79.90, NULL, NULL);
