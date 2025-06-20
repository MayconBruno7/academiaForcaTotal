-- Planos
INSERT INTO planos (id, nome, valor, treinos_semanais) VALUES
(1, 'Mensal Básico', 99.90, 3),
(2, 'Mensal Ilimitado', 149.90, 7);

-- Usuários
INSERT INTO usuario (id, nome, email, senha, nivel) VALUES

(2, 'Aluno Maria Lima', 'maria@aluno.com', '123456', 30);

-- Professores
INSERT INTO professores (id, usuario_id, nome, cpf, telefone, email, data_nascimento, especialidade, endereco, imagem) VALUES
(1, 1, 'João Silva', '12345678901', '(32) 99999-1234', 'joao@academia.com', '1980-06-15', 'Musculação', 'Rua das Palmeiras, 123', NULL);

-- Alunos
INSERT INTO alunos (id, nome, cpf, telefone, email, data_nascimento, endereco, plano_id, usuario_id) VALUES
(1, 'Maria Lima', '98765432100', '(32) 98888-4321', 'maria@aluno.com', '1995-03-22', 'Rua Alegria, 45', 1, 2);

-- Exercícios
INSERT INTO exercicios (id, nome, grupo_muscular) VALUES
(1, 'Supino Reto', 'Peito'),
(2, 'Agachamento Livre', 'Pernas'),
(3, 'Remada Curvada', 'Costas'),
(4, 'Desenvolvimento Militar', 'Ombros');

-- Fichas de treino
INSERT INTO fichas_treino (id, aluno_id, professor_id, data_inicio, validade, anotacoes) VALUES
(1, 1, 1, '2025-06-01', '2025-07-01', 'Início de treino com foco em força. Progredir carga semanalmente.');

-- Ficha exercícios
INSERT INTO ficha_exercicio (id, ficha_id, exercicio_id, series, repeticoes, carga) VALUES
(1, 1, 1, 4, 10, 60.0),
(2, 1, 2, 4, 12, 80.0),
(3, 1, 3, 4, 10, 55.0),
(4, 1, 4, 3, 12, 40.0);

-- Acompanhamentos
INSERT INTO acompanhamentos (id, ficha_id, data, peso, medidas, frequencia, observacoes) VALUES
(1, 1, '2025-06-05', 72.5, 'Peito: 95cm\nCintura: 78cm\nBraço: 32cm', 4, 'Boa execução. Ajustar carga no agachamento.'),
(2, 1, '2025-06-12', 72.9, 'Peito: 96cm\nCintura: 77cm\nBraço: 33cm', 5, 'Melhoras visíveis. Manter progressão.');

