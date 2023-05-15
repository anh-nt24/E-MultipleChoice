-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2023 at 09:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MultiA`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `Category_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`Category_id`, `name`, `status`) VALUES
('0', 'Other', 1),
('1', '1', 0),
('2', 'Software Engineering', 1),
('3', 'Programming', 1),
('4', 'Maths', 1),
('5', 'Computer Vision', 1),
('6', 'English', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Option`
--

CREATE TABLE `Option` (
  `Option_id` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `orderNum` int(11) NOT NULL,
  `isCorrect` tinyint(1) NOT NULL,
  `Question_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Option`
--

INSERT INTO `Option` (`Option_id`, `content`, `orderNum`, `isCorrect`, `Question_id`) VALUES
('645d375de233c', '2', 1, 0, '645d375de0cdf'),
('645d375de3058', '1', 2, 1, '645d375de0cdf'),
('645d375de4f88', '3', 3, 0, '645d375de0cdf'),
('645d375de6d9c', '3', 1, 0, '645d375de5b7f'),
('645d375dec09b', '1', 2, 0, '645d375de5b7f'),
('645d375dee76d', '2', 3, 1, '645d375de5b7f'),
('645d3901bfeaa', 'Capturing high-quality images to input into algorithms', 1, 0, '645d3901bf489'),
('645d3901c21d8', 'Ensuring that algorithms are scalable to handle large datasets', 2, 0, '645d3901bf489'),
('645d3901c2d7c', 'Eliminating all sources of noise or distortion from image data', 3, 0, '645d3901bf489'),
('645d3901c39e1', 'Developing algorithms that can accurately interpret subjective visual', 4, 1, '645d3901bf489'),
('645d3901c5703', ' To classify different objects in an image', 1, 0, '645d3901c4f46'),
('645d3901c5e6c', 'To separate the foreground from the background in an image', 2, 1, '645d3901c4f46'),
('645d3901c62ae', 'To detect the edges of an object in an image', 3, 0, '645d3901c4f46'),
('645d3901c6713', ' To extract features from an image', 4, 0, '645d3901c4f46'),
('645d3901c7303', 'Object Recognition', 1, 0, '645d3901c6dd8'),
('645d3901c77a7', 'Motion Analysis', 2, 0, '645d3901c6dd8'),
('645d3901c7e13', 'Sound Processing', 3, 1, '645d3901c6dd8'),
('645d3901c8252', 'Pose Estimation', 4, 0, '645d3901c6dd8'),
('645d3a3664fcb', 'Object tracking', 1, 0, '645d3a36638a5'),
('645d3a3666eef', 'Image segmentation', 2, 1, '645d3a36638a5'),
('645d3a3667e11', 'Facial recognition', 3, 0, '645d3a36638a5'),
('645d3a3669214', 'Optical character recognition (OCR)', 4, 0, '645d3a36638a5'),
('645d3a366ba72', 'Sobel operator', 1, 0, '645d3a366a0ca'),
('645d3a366c753', 'Laplacian of Gaussian (LoG)', 2, 1, '645d3a366a0ca'),
('645d3a366d455', 'Canny edge detection', 3, 0, '645d3a366a0ca'),
('645d3a366e396', 'Prewitt operator', 4, 0, '645d3a366a0ca'),
('645d3b719b0e6', 'CNN', 1, 1, '645d3b719ab95'),
('645d3b719bbce', 'RNN', 2, 0, '645d3b719ab95'),
('645d3b719c785', 'LSTM', 3, 0, '645d3b719ab95'),
('645d3b719d388', 'GAN', 4, 0, '645d3b719ab95'),
('645d3b719e18c', 'Mean Squared Error', 1, 0, '645d3b719db0c'),
('645d3b719e755', 'Mean Absolute Error', 2, 0, '645d3b719db0c'),
('645d3b719f272', 'Categorical Crossentropy', 3, 1, '645d3b719db0c'),
('645d3ecaa43d7', 'There is no difference between a struct and a class in C++', 1, 1, '645d3ecaa3a79'),
('645d3ecaa4860', 'Classes support inheritance and access control, while structs do not', 2, 0, '645d3ecaa3a79'),
('645d3ecaa4f4a', 'Structs support inheritance and access control, while classes do not', 3, 0, '645d3ecaa3a79'),
('645d3ecaa5e2a', 'Structs are allocated on the stack, while classes are allocated on the heap', 4, 0, '645d3ecaa3a79'),
('645d3ecaa7ba8', 'A destructor that is called when an object goes out of scope', 1, 0, '645d3ecaa6339'),
('645d3ecaa93b7', 'A destructor that is defined in a base class and overridden in a derived class', 2, 0, '645d3ecaa6339'),
('645d3ecaaa402', ' A destructor that is defined in a derived class and called when an object is deleted through a pointer to the base class', 3, 1, '645d3ecaa6339'),
('645d3ecaaadd0', 'A destructor that is declared as static', 4, 0, '645d3ecaa6339'),
('645dd7ab26c52', 'Siêu hệ thống.', 1, 0, '645dd7ab24945'),
('645dd7ab27361', 'Hệ thống thông tin.', 2, 0, '645dd7ab24945'),
('645dd7ab27875', 'Hệ thống con.', 3, 1, '645dd7ab24945'),
('645dd7ab28aa1', 'Phân rã chức năng.', 4, 0, '645dd7ab24945'),
('645dd7ab29a36', 'Khảo sát và phân tích', 1, 0, '645dd7ab29265'),
('645dd7ab2a2c7', 'Thiết kế và lập trình', 2, 0, '645dd7ab29265'),
('645dd7ab2a6cf', 'Phân tích và thiết kế', 3, 1, '645dd7ab29265'),
('645dd7ab2ad7f', 'Lập trình và kiểm thử', 4, 0, '645dd7ab29265'),
('645dd7ab2c505', '8', 1, 0, '645dd7ab2b7a6'),
('645dd7ab2d0a3', '6', 2, 0, '645dd7ab2b7a6'),
('645dd7ab2d74b', '7', 3, 0, '645dd7ab2b7a6'),
('645dd7ab2e031', '5', 4, 1, '645dd7ab2b7a6'),
('645dd7ab2e4ab', '10', 5, 0, '645dd7ab2b7a6'),
('645dd7ab2e956', '1', 6, 0, '645dd7ab2b7a6'),
('645df5940a40a', 'software engineering', 1, 1, '645df59408ca2'),
('645df5940b004', 'engineering software', 2, 0, '645df59408ca2'),
('645df5940cc70', 'software testing', 3, 0, '645df59408ca2'),
('645df5940e7c2', 'software developer', 4, 0, '645df59408ca2'),
('645df59410804', 'Spiral Model', 1, 1, '645df5940f4f2'),
('645df59411618', 'Waterfall Model', 2, 0, '645df5940f4f2'),
('645df594134e4', 'Quick and Fix model', 3, 0, '645df5940f4f2'),
('645df594146ff', 'Prototyping Model', 4, 0, '645df5940f4f2'),
('645df594174f4', 'Phần mềm kỹ thuật và khoa học (Engineering and Scientific Software)', 1, 0, '645df5941533b'),
('645df5941ac88', 'Phần mềm trí tuệ nhân tạo (Artificial Intelligence Software)', 2, 1, '645df5941533b'),
('645df5941c019', 'Phần mềm nhúng (embedded software).', 3, 0, '645df5941533b'),
('645df5941d3d6', 'Phần mềm ứng dụng (application software).', 4, 0, '645df5941533b'),
('645df9cc61fe2', 'a. Use case diagram', 1, 1, '645df9cc6095d'),
('645df9cc626dd', 'b. Sequence diagram', 2, 0, '645df9cc6095d'),
('645df9cc62c9a', 'c. State machine diagram', 3, 0, '645df9cc6095d'),
('645df9cc6309d', 'd. Class diagram', 4, 0, '645df9cc6095d'),
('645df9cc63fd3', 'Use case diagram', 1, 0, '645df9cc63908'),
('645df9cc64e59', 'Sequence diagram', 2, 0, '645df9cc63908'),
('645df9cc65801', 'State machine diagram', 3, 0, '645df9cc63908'),
('645df9cc66106', 'Class diagram', 4, 1, '645df9cc63908'),
('645df9cc69794', 'a. Use case diagram', 1, 0, '645df9cc67b5c'),
('645df9cc69c8a', 'b. Sequence diagram', 2, 0, '645df9cc67b5c'),
('645df9cc6a002', 'c. State machine diagram', 3, 0, '645df9cc67b5c'),
('645df9cc6a915', 'd. Activity diagram', 4, 1, '645df9cc67b5c'),
('645df9cc6b107', 'a. Use case diagram', 1, 0, '645df9cc6ad33'),
('645df9cc6cf3d', 'b. Sequence diagram', 2, 0, '645df9cc6ad33'),
('645df9cc6d629', 'c. State machine diagram', 3, 1, '645df9cc6ad33'),
('645df9cc6db0d', 'd. Class diagram', 4, 0, '645df9cc6ad33'),
('645df9cc6e582', 'Use case diagram', 1, 0, '645df9cc6df95'),
('645df9cc6e9ce', 'Sequence diagram', 2, 0, '645df9cc6df95'),
('645df9cc6eebb', 'State machine diagram', 3, 0, '645df9cc6df95'),
('645df9cc6f40c', 'Class diagram', 4, 1, '645df9cc6df95'),
('645dfd9501004', 'clouds', 1, 0, '645dfd94f414e'),
('645dfd9502071', 'costs', 2, 1, '645dfd94f414e'),
('645dfd9503217', 'pains', 3, 0, '645dfd94f414e'),
('645dfd9504e08', 'farms', 4, 0, '645dfd94f414e'),
('645dfd9506c7c', 'lake', 1, 0, '645dfd95056f3'),
('645dfd95076ac', 'game', 2, 0, '645dfd95056f3'),
('645dfd95090f5', 'shape', 3, 0, '645dfd95056f3'),
('645dfd950a0d0', 'flat', 4, 1, '645dfd95056f3'),
('645dfe3b1223a', 'expensive', 1, 0, '645dfe3b10ce2'),
('645dfe3b13d2b', 'successful', 2, 0, '645dfe3b10ce2'),
('645dfe3b1496e', 'important', 3, 0, '645dfe3b10ce2'),
('645dfe3b150b9', 'musical', 4, 1, '645dfe3b10ce2'),
('645dfe3b16501', 'practice', 1, 1, '645dfe3b15a34'),
('645dfe3b18158', 'include', 2, 0, '645dfe3b15a34'),
('645dfe3b1914a', 'arrive', 3, 0, '645dfe3b15a34'),
('645dfe3b19dd4', 'accept', 4, 0, '645dfe3b15a34'),
('645f580226537', 'The process of extracting features from an image or video stream', 1, 0, '645f580225c63'),
('645f580227113', 'The process of detecting and localizing objects within an image or video stream', 2, 1, '645f580225c63'),
('645f58022777b', 'The process of segmenting an image or video stream into smaller regions', 3, 0, '645f580225c63'),
('645f58022865f', ' The process of enhancing the quality of an image or video stream', 4, 0, '645f580225c63'),
('645f580229802', 'Face recognition', 1, 1, '645f580228b03'),
('645f58022ae01', 'Resolution enhancement', 2, 0, '645f580228b03'),
('645f58022b4d6', 'Noise reduction', 3, 0, '645f580228b03'),
('645f58022b9ee', 'Image filtering', 4, 0, '645f580228b03'),
('645f58022c88f', 'Object detection refers to detecting the presence of objects, whereas object recognition involves identifying the object class.', 1, 1, '645f58022c121'),
('645f58022d4aa', 'Object detection is more complex than object recognition.', 2, 0, '645f58022c121'),
('645f58022e015', 'Object recognition is more accurate than object detection.', 3, 0, '645f58022c121'),
('645f58022f4a6', 'There is no difference between object detection and object recognition.', 4, 0, '645f58022c121'),
('645f580230134', 'To segment an image or video stream into smaller regions', 1, 0, '645f58022fc19'),
('645f580230625', 'To extract features from an image or video stream', 2, 0, '645f58022fc19'),
('645f580230e95', 'To enhance the quality of an image or video stream', 3, 0, '645f58022fc19'),
('645f58023161d', 'To classify and identify objects within an image or video stream', 4, 1, '645f58022fc19'),
('645f5802328c0', 'Feature-based methods', 1, 1, '645f580231dd1'),
('645f5802334d0', 'Noise reduction algorithms', 2, 0, '645f580231dd1'),
('645f580234d55', 'There is no difference between local features and global features.', 1, 0, '645f580233f03'),
('645f580235486', 'Local features describe individual parts or regions of an object, while global features describe the object as a whole.', 2, 1, '645f580233f03'),
('645f5802380ee', 'Random forest', 1, 0, '645f5802363de'),
('645f58023888d', 'Support vector machine (SVM)', 2, 1, '645f5802363de'),
('645f5802396e5', ' It applies mathematical formulae to noise reduction in an image or video stream', 1, 0, '645f580238db0'),
('645f580239f06', 'It segments an image or video stream into smaller regions based on color or texture characteristics.', 2, 0, '645f580238db0'),
('645f58023a515', 'It takes in an input image and processes it through a series of convolutions and pooling layers to extract relevant features for object recognition.', 3, 1, '645f580238db0'),
('645f58023b78e', 'Transferring the image data from one machine to another for processing.', 1, 0, '645f58023af02'),
('645f58023cd73', 'Using a pre-trained model as the starting point for solving a new object recognition problem.', 2, 1, '645f58023af02'),
('645f58023ea11', 'It can improve the accuracy of object recognition', 1, 1, '645f58023dfba'),
('645f58023f210', 'It can enhance the resolution of an image or video stream', 2, 0, '645f58023dfba'),
('645f580242921', 'To detect and avoid obstacles while driving', 1, 1, '645f580241a20'),
('645f580245c5a', 'CIFAR-10', 1, 0, '645f58024388c'),
('645f58024637c', 'MNIST', 2, 0, '645f58024388c'),
('645f580246812', 'COCO', 3, 1, '645f58024388c'),
('645f580246f4d', 'Fashion-MNIST', 4, 0, '645f58024388c'),
('645f580247b75', 'An object detection algorithm that processes entire images in a single pass', 1, 1, '645f580247668'),
('645f5802483aa', 'A segmentation technique that divides the input image into smaller regions', 2, 0, '645f580247668'),
('645f5802492bc', 'To detect and track individuals or objects of interest', 1, 1, '645f580248a2d'),
('645f580249a7f', 'To segment the images captured by surveillance cameras into smaller regions', 2, 0, '645f580248a2d'),
('645f58024ac7a', 'To enhance the resolution of an image or video stream', 1, 0, '645f58024a4a6'),
('645f58024b835', 'To extract features from an image or video stream', 2, 0, '645f58024a4a6'),
('645f58024c4ac', 'To avoid the need to train an entire model from scratch', 3, 1, '645f58024a4a6'),
('645f58024db3b', 'It is less accurate than traditional machine learning algorithms', 1, 0, '645f58024d2f9'),
('645f58024ea27', 'It requires large amounts of data and computing power', 2, 1, '645f58024d2f9'),
('645f58024f279', 'It is not capable of recognizing complex objects or scenes', 3, 0, '645f58024d2f9'),
('645f5802505eb', 'To enhance the resolution of medical images', 1, 0, '645f5802500b3'),
('645f580251019', 'To detect and classify abnormalities or anomalies in medical images', 2, 1, '645f5802500b3'),
('645f5802517a0', 'Yes', 1, 1, '645f5802540bc'),
('645f580251b68', 'To reduce the amount of noise in medical images', 3, 0, '645f5802500b3'),
('645f580253100', 'An object detection algorithm that uses histograms of edge gradients to detect objects', 1, 1, '645f5802527f1'),
('645f5802537c6', 'No', 2, 0, '645f5802540bc'),
('645f5802537d5', 'A segmentation technique that divides an image or video stream into smaller regions', 2, 0, '645f5802527f1'),
('645f580254d9f', 'It may not work well on extremely complex or cluttered scenes', 1, 1, '645f580254817'),
('645f5802553c7', 'It may be prone to overfitting if the training dataset is not diverse enough', 2, 0, '645f580254817'),
('645fb69d7ac52', '3', 1, 1, '645fb69d7a202'),
('645fb69d7b684', '2', 2, 0, '645fb69d7a202'),
('645fb69d7c4d3', '4', 3, 0, '645fb69d7a202'),
('645fb69d7cb2d', '4', 4, 0, '645fb69d7a202'),
('645fb69d7d97a', 'Quan hệ tổng quát hoá (generalization)', 1, 0, '645fb69d7d32f'),
('645fb69d7e0ee', 'Quan hệ mở rộng (extend)', 2, 0, '645fb69d7d32f'),
('645fb69d7e6b2', 'Quan hệ kết hợp (association)', 3, 1, '645fb69d7d32f'),
('645fb69d7ee16', 'Quan hệ bao gồm (include)', 4, 0, '645fb69d7d32f'),
('645fb802b7648', 'Guard condition', 1, 0, '645fb802b6a70'),
('645fb802b8c56', 'Control flow', 2, 0, '645fb802b6a70'),
('645fb802b9ace', 'Decision', 3, 1, '645fb802b6a70'),
('645fb802bb98d', 'Activity', 4, 0, '645fb802b6a70'),
('645fb802bf60d', 'Activity', 1, 1, '645fb802beda2'),
('645fb802c0103', 'Control flow', 2, 0, '645fb802beda2'),
('645fb802c0ac5', 'Guard condition', 3, 0, '645fb802beda2'),
('645fb8678ac27', 'Initiation', 1, 0, '645fb8678a02d'),
('645fb8678b7bd', 'Construction', 2, 0, '645fb8678a02d'),
('645fb8678c7f8', 'Final Verification and Validation', 3, 0, '645fb8678a02d'),
('645fb8678db02', 'Discovery', 4, 1, '645fb8678a02d'),
('645fb8678fdee', '3', 1, 0, '645fb8678ea52'),
('645fb86790de4', '4', 2, 0, '645fb8678ea52'),
('645fb86792795', '5', 3, 1, '645fb8678ea52'),
('645fb86792d15', '6', 4, 0, '645fb8678ea52'),
('645fbce51153c', 'Phân tích màu sắc', 1, 0, '645fbce510685'),
('645fbce511b94', 'Phân tích hình dạng', 2, 0, '645fbce510685'),
('645fbce512b39', 'Phân tích cấu trúc', 3, 0, '645fbce510685'),
('645fbce513365', 'Tất cả các phương pháp trên.', 4, 1, '645fbce510685'),
('645fbce514b13', 'Content-Based Image Retrieval sử dụng các thuộc tính của hình ảnh để tìm kiếm, trong khi text-based retrieval sử dụng các thông tin văn bản để tìm kiếm.', 1, 1, '645fbce514569'),
('645fbce514fbf', 'Content-Based Image Retrieval chỉ tìm kiếm hình ảnh, trong khi text-based retrieval tìm kiếm các tài liệu có chứa văn bản.', 2, 0, '645fbce514569'),
('645fbe8e9b571', 'Giảm nhiễu ảnh', 1, 0, '645fbe8e9a822'),
('645fbe8e9c16f', 'Phát hiện đối tượng trong ảnh', 2, 0, '645fbe8e9a822'),
('645fbe8e9cafa', 'Trích xuất các đặc trưng chỉ số màu sắc trong ảnh', 3, 1, '645fbe8e9a822'),
('645fbe8e9db56', 'Filtering', 1, 1, '645fbe8e9d6d8'),
('645fbe8e9e417', 'Feature extraction', 2, 0, '645fbe8e9d6d8'),
('645fbe8e9e8c5', 'Object tracking', 3, 0, '645fbe8e9d6d8');

-- --------------------------------------------------------

--
-- Table structure for table `Question`
--

CREATE TABLE `Question` (
  `Question_id` varchar(100) NOT NULL,
  `question` text NOT NULL,
  `score` float NOT NULL,
  `type` int(1) NOT NULL,
  `Quiz_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Question`
--

INSERT INTO `Question` (`Question_id`, `question`, `score`, `type`, `Quiz_id`) VALUES
('645d375de0cdf', 'cau hoi 1', 5, 1, '645d375ddf92d'),
('645d375de5b7f', 'cau hoi 2', 5, 1, '645d375ddf92d'),
('645d3901bf489', 'What is a major challenge of Computer Vision?', 2, 1, '645d3901ba459'),
('645d3901c4f46', 'What is the purpose of image segmentation in computer vision?', 4, 1, '645d3901ba459'),
('645d3901c6dd8', 'Which of the following is NOT a major task in computer vision?', 4, 1, '645d3901ba459'),
('645d3a36638a5', 'Which of the following is a common application of edge detection?', 5, 1, '645d3a3662c59'),
('645d3a366a0ca', 'Which of the following methods is suitable for detecting edges in noisy images?', 5, 1, '645d3a3662c59'),
('645d3b719ab95', 'Which of the following deep learning architectures is commonly used for image segmentation?', 5, 1, '645d3b71998cc'),
('645d3b719db0c', 'Which loss function is commonly used in image segmentation using deep learning?', 5, 1, '645d3b71998cc'),
('645d3ecaa3a79', 'What is the difference between a struct and a class in C++?', 5, 1, '645d3ecaa2e50'),
('645d3ecaa6339', 'What is a virtual destructor in C++?', 5, 1, '645d3ecaa2e50'),
('645dd7ab24945', 'Một hệ thống là một phần của một hệ thống lớn khác được gọi là?', 4, 1, '645dd7ab237bd'),
('645dd7ab29265', 'Trong quá trình phát triển một hệ thống thông tin, những giai đoạn nào sau đây được xem là giai đoạn trung tâm?', 4, 1, '645dd7ab237bd'),
('645dd7ab2b7a6', 'Trong vòng đời phát triển phần mềm (SDLC) có mấy giai đoạn chính?', 2, 1, '645dd7ab237bd'),
('645df59408ca2', 'Công nghệ phần mềm có từ tiếng Anh là', 2, 1, '645df59408091'),
('645df5940f4f2', 'Mô hình được phổ biến cho sinh viên với các dự án nhỏ?', 4, 1, '645df59408091'),
('645df5941533b', 'Hệ chuyên gia (Expert system), phần mềm nhận biết giọng nói, trò chơi đánh cờ cùng máy tính là ví dụ của loại phần mềm:', 4, 1, '645df59408091'),
('645df9cc6095d', 'Loại diagram nào được sử dụng để mô tả các ca sử dụng của hệ thống?', 2, 1, '645df9cc5abbb'),
('645df9cc63908', 'Loại diagram nào được sử dụng để mô tả các đối tượng và các mối quan hệ giữa chúng?', 2, 1, '645df9cc5abbb'),
('645df9cc67b5c', 'Loại diagram nào được sử dụng để mô tả các hoạt động của hệ thống hoặc một phần trong hệ thống?', 2, 1, '645df9cc5abbb'),
('645df9cc6ad33', 'Loại diagram nào được sử dụng để mô tả các trạng thái của các đối tượng?', 2, 1, '645df9cc5abbb'),
('645df9cc6df95', 'Loại diagram nào được sử dụng để mô tả các thành phần lớp của các hệ thống phần mềm và các quan hệ giữa chúng?', 2, 1, '645df9cc5abbb'),
('645dfd94f414e', 'Indicate the word whose \"s\" letter differs from the other three in pronunciation', 5, 1, '645dfd94f3628'),
('645dfd95056f3', 'Indicate the word whose \"s\" letter differs from the other three in pronunciation', 5, 1, '645dfd94f3628'),
('645dfe3b10ce2', 'Indicate the word that differs from the other three in the position of primary stress', 5, 1, '645dfe3b1002f'),
('645dfe3b15a34', 'Indicate the word that differs from the other three in the position of primary stress', 5, 1, '645dfe3b1002f'),
('645f580225c63', 'What is object recognition?', 0.5, 1, '645f580225406'),
('645f580228b03', 'Which is an example of object recognition application?', 0.5, 1, '645f580225406'),
('645f58022c121', 'What is the difference between object detection and object recognition?', 0.5, 1, '645f580225406'),
('645f58022fc19', 'What is the purpose of object recognition?', 0.5, 1, '645f580225406'),
('645f580231dd1', 'What is a common approach to object recognition?', 0.5, 1, '645f580225406'),
('645f580233f03', 'What is the difference between local feature and global feature in object recognition?', 0.5, 1, '645f580225406'),
('645f5802363de', 'Which machine learning algorithm is commonly used in object recognition?', 0.5, 1, '645f580225406'),
('645f580238db0', 'How does a convolutional neural network (CNN) work in object recognition?', 0.5, 1, '645f580225406'),
('645f58023af02', 'What is transfer learning in object recognition?', 0.5, 1, '645f580225406'),
('645f58023dfba', 'Why is data augmentation important in object recognition?', 0.5, 1, '645f580225406'),
('645f580241a20', 'How can object recognition be used in autonomous vehicles?', 0.5, 1, '645f580225406'),
('645f58024388c', 'Which of the following is a common dataset used for object recognition?', 0.5, 1, '645f580225406'),
('645f580247668', 'What is YOLO (You Only Look Once) in object recognition?', 0.5, 1, '645f580225406'),
('645f580248a2d', 'How can object recognition be used in security and surveillance systems?', 0.5, 1, '645f580225406'),
('645f58024a4a6', 'What is transfer learning useful for in object recognition?', 0.5, 1, '645f580225406'),
('645f58024d2f9', 'Which of the following is a disadvantage of using deep learning in object recognition?', 0.5, 1, '645f580225406'),
('645f5802500b3', 'How can object recognition be used in medical imaging?', 0.5, 1, '645f580225406'),
('645f5802527f1', 'What is HOG (Histogram of Oriented Gradients) in object recognition?', 0.5, 1, '645f580225406'),
('645f5802540bc', 'Can object recognition be used for real-time video analysis and tracking?', 0.5, 1, '645f580225406'),
('645f580254817', 'What is one potential limitation of using object recognition?', 0.5, 1, '645f580225406'),
('645fb69d7a202', 'Sơ đồ Use Case gồm mấy thành phần chính?', 5, 1, '645fb69d79b15'),
('645fb69d7d32f', 'Mối quan hệ nào sau đây dùng để mô tả mối quan hệ giữa Actor và Use Case hoặc giữa các Use Case với nhau?', 5, 1, '645fb69d79b15'),
('645fb802b6a70', 'Trong sơ đồ hoạt động (Activity Diagram), thành phần nào mô tả khả năng của nhiều hướng đi khác nhau?', 5, 1, '645fb802b5db5'),
('645fb802beda2', 'Trong sơ đồ hoạt động (Activity Diagram), thành phần nào mô tả một bước hoạt động trong quy trình?', 5, 1, '645fb802b5db5'),
('645fb8678a02d', 'Giai đoạn thứ hai của vòng đời phát triển phần mềm (SDLC) là gì?', 5, 1, '645fb86788a84'),
('645fb8678ea52', 'Trong vòng đời phát triển phần mềm (SDLC) có mấy giai đoạn chính?', 5, 1, '645fb86788a84'),
('645fbce510685', 'Các phương pháp trích xuất đặc trưng nào có thể được sử dụng trong Content-Based Image Retrieval?', 5, 1, '645fbce50f920'),
('645fbce514569', 'Phân biệt giữa Content-Based Image Retrieval và phương pháp tìm kiếm dựa trên văn bản (text-based retrieval)?', 5, 1, '645fbce50f920'),
('645fbe8e9a822', 'Đâu là một ví dụ về phương pháp rút trích đặc trưng trong xử lý ảnh?', 5, 1, '645fbe8e9a15e'),
('645fbe8e9d6d8', 'Phương pháp xử lý ảnh nào được sử dụng để giảm nhiễu ảnh và tăng độ tương phản?', 5, 1, '645fbe8e9a15e');

-- --------------------------------------------------------

--
-- Table structure for table `Quiz`
--

CREATE TABLE `Quiz` (
  `Quiz_id` varchar(100) NOT NULL,
  `title` text DEFAULT NULL,
  `examDate` datetime DEFAULT NULL,
  `dueDate` datetime DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `isPublic` tinyint(1) NOT NULL DEFAULT 1,
  `quizNum` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `Category_id` varchar(100) NOT NULL,
  `author_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Quiz`
--

INSERT INTO `Quiz` (`Quiz_id`, `title`, `examDate`, `dueDate`, `duration`, `level`, `isPublic`, `quizNum`, `active`, `Category_id`, `author_id`) VALUES
('645d375ddf92d', 'bai thi', '2023-05-11 11:00:00', '2023-05-15 11:00:00', 5, 5, 1, 2, 1, '0', '645d366e36958'),
('645d3901ba459', 'Introduction to Computer Vision', '2023-05-10 08:00:00', '2023-05-16 08:00:00', 10, 30, 2, 4, 1, '5', '645d366e36958'),
('645d3a3662c59', 'Edge Detection', '2023-05-11 20:55:50', NULL, 10, 30, 1, 2, 1, '5', '645d366e36958'),
('645d3b71998cc', 'Semantic segmentation', '2023-05-11 21:01:05', NULL, 50, 70, 1, 2, 1, '5', '645d366e36958'),
('645d3ecaa2e50', 'Object-oriented programming in C++', '2023-05-11 21:15:22', NULL, 20, 50, 1, 2, 1, '3', '645d366e36958'),
('645dd7ab237bd', 'Phân tích và thiết kế yêu cầu (Ôn tập)', '2023-05-13 17:00:00', '2023-05-15 17:00:00', 10, 40, 1, 3, 1, '2', '645cd995bbe5b'),
('645df59408091', 'Ôn tập công nghệ phần mềm', '2023-05-14 11:00:00', '2023-05-15 00:00:00', 15, 30, 2, 3, 1, '2', '645cd995bbe5b'),
('645df9cc5abbb', 'Các loại diagrams trong thiết kế yêu cầu phần mềm', '2023-03-15 11:00:00', NULL, NULL, 10, 1, 5, 1, '2', '645cd995bbe5b'),
('645dfd94f3628', 'Pronunciation difference in English', '2022-07-12 00:00:00', NULL, 5, 5, 1, 2, 1, '6', '645cd995bbe5b'),
('645dfe3b1002f', 'Primary stress difference', '2023-05-12 10:52:11', NULL, 5, 5, 1, 2, 1, '6', '645cd995bbe5b'),
('645f580225406', 'Object Recognition', '2023-05-09 10:00:00', '2023-05-14 00:00:00', 20, 65, 2, 20, 1, '5', '645d366e36958'),
('645fb69d79b15', 'Usecase diagram', '2023-05-13 23:11:09', NULL, NULL, 30, 1, 2, 1, '2', '645cd995bbe5b'),
('645fb802b5db5', 'Activity diagram', '2023-05-03 23:14:00', NULL, NULL, 35, 1, 2, 1, '2', '645cd995bbe5b'),
('645fb86788a84', 'Vòng đời phát triển phần mềm (SDLC)', '2023-05-13 23:18:47', NULL, NULL, 40, 1, 2, 1, '2', '645cd995bbe5b'),
('645fbce50f920', 'Content-Based Image Retrieval (CBIR)', '2023-05-13 23:37:57', NULL, NULL, 0, 1, 2, 0, '5', '645d366e36958'),
('645fbe8e9a15e', 'Vấn đề về xử lý ảnh số trong thị giác máy tính', '2023-05-13 23:45:02', NULL, NULL, 30, 1, 2, 1, '5', '645d366e36958');

-- --------------------------------------------------------

--
-- Table structure for table `Report`
--

CREATE TABLE `Report` (
  `report_id` varchar(100) NOT NULL,
  `reportedAt` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `user_id` varchar(100) NOT NULL,
  `quiz_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Report`
--

INSERT INTO `Report` (`report_id`, `reportedAt`, `reason`, `description`, `file`, `status`, `user_id`, `quiz_id`) VALUES
('1683871091_645cd995bbe5b_645d3901ba459', '2023-05-12', 'Quiz error', 'In the result page, I got 100% completion. But in homepage, it showed that i just got 75%', '1683871091_645cd995bbe5b_645d3901ba459.png', 1, '645cd995bbe5b', '645d3901ba459'),
('1683955353_645eff9904329_645d3a3662c59', '2023-05-13', 'Wrong quiz', 'I attempted to the quiz 2 times but i could not get 10. I think there is something going wrong here', '1683955353_645eff9904329_645d3a3662c59.png', 1, '645eff9904329', '645d3a3662c59');

-- --------------------------------------------------------

--
-- Table structure for table `Response`
--

CREATE TABLE `Response` (
  `Response_id` varchar(100) NOT NULL,
  `Quiz_id` varchar(100) NOT NULL,
  `User_id` varchar(100) NOT NULL,
  `responseAt` datetime NOT NULL,
  `totalScore` float NOT NULL,
  `inTime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Response`
--

INSERT INTO `Response` (`Response_id`, `Quiz_id`, `User_id`, `responseAt`, `totalScore`, `inTime`) VALUES
('645dc8f813e4e', '645d3901ba459', '645cd995bbe5b', '2023-05-12 12:04:47', 10, 31),
('645dc92d31601', '645d3a3662c59', '645cd995bbe5b', '2023-05-12 12:05:20', 5, 42),
('645dd3cd63af2', '645d3901ba459', '645cd995bbe5b', '2023-05-12 12:51:40', 10, 20),
('645e7c3590b09', '645d3a3662c59', '645cd995bbe5b', '2023-05-13 00:49:41', 5, 22),
('645e7c585b169', '645d3b71998cc', '645cd995bbe5b', '2023-05-13 00:50:16', 10, 21),
('645e89df2b8b2', '645d3a3662c59', '645cd995bbe5b', '2023-05-13 01:47:59', 0, 5),
('645f1512336ef', '645d3b71998cc', '645efec3db82e', '2023-05-13 11:41:54', 5, 9),
('645f15210fcd9', '645d3b71998cc', '645efec3db82e', '2023-05-13 11:42:09', 0, 10),
('645f1529ccc48', '645d3b71998cc', '645efec3db82e', '2023-05-13 11:42:17', 0, 5),
('645f1535aa9b0', '645d3b71998cc', '645efec3db82e', '2023-05-13 11:42:29', 5, 10),
('645f155cb1dd7', '645d3b71998cc', '645eff394fc75', '2023-05-13 11:43:08', 5, 13),
('645f1565782ef', '645d3b71998cc', '645eff394fc75', '2023-05-13 11:43:17', 10, 5),
('645f158c204c0', '645d3b71998cc', '645eff5ca7a73', '2023-05-13 11:43:56', 10, 6),
('645f15a7007e6', '645d3b71998cc', '645eff9904329', '2023-05-13 11:44:23', 5, 7),
('645f15b096b8e', '645d3b71998cc', '645eff9904329', '2023-05-13 11:44:32', 0, 8),
('645f17f149272', '645d3a3662c59', '645eff394fc75', '2023-05-13 11:54:09', 0, 5),
('645f181a71fbf', '645d3ecaa2e50', '645eff394fc75', '2023-05-13 11:54:50', 0, 12),
('645f1e2360308', '645d3a3662c59', '645eff9904329', '2023-05-13 12:20:35', 0, 8),
('645f1e2910f84', '645d3a3662c59', '645eff9904329', '2023-05-13 12:20:41', 5, 5),
('645f5ca5aef1b', '645f580225406', '645eff9904329', '2023-05-13 16:47:17', 9.5, 379),
('645f5d3cd872d', '645f580225406', '645eff9904329', '2023-05-13 16:49:48', 5.5, 42),
('645f5d698279f', '645f580225406', '645eff9904329', '2023-05-13 16:50:33', 7, 41),
('645f5f21171b2', '645f580225406', '645eff394fc75', '2023-05-13 16:57:53', 4, 320),
('645f5f480fd47', '645f580225406', '645eff394fc75', '2023-05-13 16:58:32', 5.5, 28),
('645f5f66bff7e', '645f580225406', '645eff394fc75', '2023-05-13 16:59:02', 2, 28),
('645f5fb01ad5e', '645f580225406', '645efec3db82e', '2023-05-13 17:00:16', 5, 23),
('645f85a09806c', '645f580225406', '645eff9904329', '2023-05-13 19:42:08', 1.5, 68),
('645f86161253e', '645f580225406', '645eff9904329', '2023-05-13 19:44:06', 0.5, 76),
('645f86bf52f2f', '645f580225406', '645eff5ca7a73', '2023-05-13 19:46:55', 5.5, 96),
('645f875661b47', '645f580225406', '645eff5ca7a73', '2023-05-13 19:49:26', 7.5, 72),
('645f87cea45d0', '645f580225406', '645eff5ca7a73', '2023-05-13 19:51:26', 8, 30),
('645f87fa6d306', '645f580225406', '645eff5ca7a73', '2023-05-13 19:52:10', 2.5, 35),
('645f883592900', '645f580225406', '645cd995bbe5b', '2023-05-13 19:53:09', 5.5, 24),
('645f8876b772e', '645f580225406', '645cd995bbe5b', '2023-05-13 19:54:14', 10, 58),
('645fadaa02aab', '645dd7ab237bd', '645cd995bbe5b', '2023-05-13 22:32:58', 6, 2550),
('645fae747313e', '645dfd94f3628', '645d366e36958', '2023-05-13 22:36:20', 5, 10),
('645fae8159cf7', '645dfd94f3628', '645d366e36958', '2023-05-13 22:36:33', 10, 6),
('645fb54bafc0a', '645dd7ab237bd', '645d366e36958', '2023-05-13 23:05:31', 6, 1688),
('645fb55a29fdd', '645dd7ab237bd', '645d366e36958', '2023-05-13 23:05:46', 10, 8),
('645fb7ae0949c', '645fb69d79b15', '645d366e36958', '2023-05-13 23:15:42', 10, 7),
('645fb89368a0d', '645d3b71998cc', '645cd995bbe5b', '2023-05-13 23:19:31', 10, 2713),
('645fb90e25763', '645f580225406', '645cd995bbe5b', '2023-05-13 23:21:34', 8.5, 101),
('645fc238975d5', '645fb69d79b15', '645d366e36958', '2023-05-14 00:00:40', 10, 9),
('6460cbd36c44c', '645fbe8e9a15e', '645cd995bbe5b', '2023-05-14 18:53:55', 10, 28770),
('6461d97511782', '645fbe8e9a15e', '645cd995bbe5b', '2023-05-15 14:04:21', 5, 36);

-- --------------------------------------------------------

--
-- Table structure for table `ResponseDetails`
--

CREATE TABLE `ResponseDetails` (
  `id` varchar(100) NOT NULL,
  `Response_id` varchar(100) NOT NULL,
  `Question_id` varchar(100) NOT NULL,
  `Option_id` varchar(100) NOT NULL,
  `isCorrect` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ResponseDetails`
--

INSERT INTO `ResponseDetails` (`id`, `Response_id`, `Question_id`, `Option_id`, `isCorrect`) VALUES
('645dc8f8177db', '645dc8f813e4e', '645d3901bf489', '645d3901c39e1', 1),
('645dc8f818b4b', '645dc8f813e4e', '645d3901c4f46', '645d3901c5e6c', 1),
('645dc8f819f01', '645dc8f813e4e', '645d3901c6dd8', '645d3901c7e13', 1),
('645dc92d35135', '645dc92d31601', '645d3a36638a5', '645d3a3666eef', 1),
('645dc92d39d18', '645dc92d31601', '645d3a366a0ca', '645d3a366d455', 0),
('645dd3cd65959', '645dd3cd63af2', '645d3901bf489', '645d3901c39e1', 1),
('645dd3cd66df3', '645dd3cd63af2', '645d3901c4f46', '645d3901c5e6c', 1),
('645dd3cd6a0f9', '645dd3cd63af2', '645d3901c6dd8', '645d3901c7e13', 1),
('645e7c359112b', '645e7c3590b09', '645d3a36638a5', '645d3a3666eef', 1),
('645e7c35916fe', '645e7c3590b09', '645d3a366a0ca', '645d3a366d455', 0),
('645e7c585ec87', '645e7c585b169', '645d3b719ab95', '645d3b719b0e6', 1),
('645e7c5860474', '645e7c585b169', '645d3b719db0c', '645d3b719f272', 1),
('645e89df2c665', '645e89df2b8b2', '645d3a36638a5', '645d3a3664fcb', 0),
('645e89df2d1a2', '645e89df2b8b2', '645d3a366a0ca', '645d3a366ba72', 0),
('645f151234e02', '645f1512336ef', '645d3b719ab95', '645d3b719b0e6', 1),
('645f15123574b', '645f1512336ef', '645d3b719db0c', '645d3b719e755', 0),
('645f1521103c0', '645f15210fcd9', '645d3b719ab95', '645d3b719bbce', 0),
('645f152110f92', '645f15210fcd9', '645d3b719db0c', '645d3b719e18c', 0),
('645f1529cd2c1', '645f1529ccc48', '645d3b719ab95', '645d3b719bbce', 0),
('645f1529cd690', '645f1529ccc48', '645d3b719db0c', '645d3b719e18c', 0),
('645f1535abf46', '645f1535aa9b0', '645d3b719ab95', '645d3b719b0e6', 1),
('645f1535acbee', '645f1535aa9b0', '645d3b719db0c', '645d3b719e18c', 0),
('645f155cb3263', '645f155cb1dd7', '645d3b719ab95', '645d3b719b0e6', 1),
('645f155cb439d', '645f155cb1dd7', '645d3b719db0c', '645d3b719e18c', 0),
('645f15657baf8', '645f1565782ef', '645d3b719ab95', '645d3b719b0e6', 1),
('645f15657c01b', '645f1565782ef', '645d3b719db0c', '645d3b719f272', 1),
('645f158c22b0c', '645f158c204c0', '645d3b719ab95', '645d3b719b0e6', 1),
('645f158c24053', '645f158c204c0', '645d3b719db0c', '645d3b719f272', 1),
('645f15a703de4', '645f15a7007e6', '645d3b719ab95', '645d3b719c785', 0),
('645f15a704c02', '645f15a7007e6', '645d3b719db0c', '645d3b719f272', 1),
('645f15b09a625', '645f15b096b8e', '645d3b719ab95', '645d3b719d388', 0),
('645f15b09af69', '645f15b096b8e', '645d3b719db0c', '645d3b719e755', 0),
('645f17f149a3c', '645f17f149272', '645d3a36638a5', '645d3a3664fcb', 0),
('645f17f149ef8', '645f17f149272', '645d3a366a0ca', '645d3a366ba72', 0),
('645f181a726ad', '645f181a71fbf', '645d3ecaa3a79', '645d3ecaa43d7', 1),
('645f181a7328d', '645f181a71fbf', '645d3ecaa6339', '645d3ecaa7ba8', 0),
('645f1e2361a01', '645f1e2360308', '645d3a36638a5', '645d3a3664fcb', 0),
('645f1e2361e2f', '645f1e2360308', '645d3a366a0ca', '645d3a366ba72', 0),
('645f1e2911bad', '645f1e2910f84', '645d3a36638a5', '645d3a3669214', 0),
('645f1e291328f', '645f1e2910f84', '645d3a366a0ca', '645d3a366c753', 1),
('645f5ca5af64a', '645f5ca5aef1b', '645f580225c63', '645f580227113', 1),
('645f5ca5b0026', '645f5ca5aef1b', '645f580228b03', '645f580229802', 1),
('645f5ca5b02f6', '645f5ca5aef1b', '645f58022c121', '645f58022c88f', 1),
('645f5ca5b060c', '645f5ca5aef1b', '645f58022fc19', '645f58023161d', 1),
('645f5ca5b0ae1', '645f5ca5aef1b', '645f580231dd1', '645f5802328c0', 1),
('645f5ca5b0efe', '645f5ca5aef1b', '645f580233f03', '645f580235486', 1),
('645f5ca5b1a71', '645f5ca5aef1b', '645f5802363de', '645f58023888d', 1),
('645f5ca5b1d60', '645f5ca5aef1b', '645f580238db0', '645f58023a515', 1),
('645f5ca5b1fdf', '645f5ca5aef1b', '645f58023af02', '645f58023cd73', 1),
('645f5ca5b2599', '645f5ca5aef1b', '645f58023dfba', '645f58023ea11', 1),
('645f5ca5b2a5e', '645f5ca5aef1b', '645f580241a20', '645f580242921', 1),
('645f5ca5b2dac', '645f5ca5aef1b', '645f58024388c', '645f580246812', 1),
('645f5ca5b3060', '645f5ca5aef1b', '645f580247668', '645f580247b75', 1),
('645f5ca5b332b', '645f5ca5aef1b', '645f580248a2d', '645f5802492bc', 1),
('645f5ca5b36d1', '645f5ca5aef1b', '645f58024a4a6', '645f58024c4ac', 1),
('645f5ca5b3b69', '645f5ca5aef1b', '645f58024d2f9', '645f58024ea27', 1),
('645f5ca5b3e2d', '645f5ca5aef1b', '645f5802500b3', '645f580251019', 1),
('645f5ca5b4087', '645f5ca5aef1b', '645f5802527f1', '645f580253100', 1),
('645f5ca5b42e5', '645f5ca5aef1b', '645f5802540bc', '645f5802537c6', 0),
('645f5ca5b4584', '645f5ca5aef1b', '645f580254817', '645f580254d9f', 1),
('645f5d3cd8c97', '645f5d3cd872d', '645f580225c63', '645f580227113', 1),
('645f5d3cd9033', '645f5d3cd872d', '645f580228b03', '645f580229802', 1),
('645f5d3cd9404', '645f5d3cd872d', '645f58022c121', '645f58022c88f', 1),
('645f5d3cd96bf', '645f5d3cd872d', '645f58022fc19', '645f58023161d', 1),
('645f5d3cd9b2d', '645f5d3cd872d', '645f580231dd1', '645f5802334d0', 0),
('645f5d3cd9df0', '645f5d3cd872d', '645f580233f03', '645f580234d55', 0),
('645f5d3cda23e', '645f5d3cd872d', '645f5802363de', '645f58023888d', 1),
('645f5d3cda549', '645f5d3cd872d', '645f580238db0', '645f5802396e5', 0),
('645f5d3cdaa81', '645f5d3cd872d', '645f58023af02', '645f58023b78e', 0),
('645f5d3cdb3e1', '645f5d3cd872d', '645f58023dfba', '645f58023f210', 0),
('645f5d3cdb64b', '645f5d3cd872d', '645f580241a20', '645f580242921', 1),
('645f5d3cdbc3f', '645f5d3cd872d', '645f58024388c', '645f58024637c', 0),
('645f5d3cdbece', '645f5d3cd872d', '645f580247668', '645f5802483aa', 0),
('645f5d3cdc10e', '645f5d3cd872d', '645f580248a2d', '645f5802492bc', 1),
('645f5d3cdc334', '645f5d3cd872d', '645f58024a4a6', '645f58024ac7a', 0),
('645f5d3cdc594', '645f5d3cd872d', '645f58024d2f9', '645f58024ea27', 1),
('645f5d3cdcc28', '645f5d3cd872d', '645f5802500b3', '645f580251019', 1),
('645f5d3cdcffa', '645f5d3cd872d', '645f5802527f1', '645f580253100', 1),
('645f5d3cdd5c9', '645f5d3cd872d', '645f5802540bc', '645f5802517a0', 1),
('645f5d3cdda18', '645f5d3cd872d', '645f580254817', '645f5802553c7', 0),
('645f5d6982eaf', '645f5d698279f', '645f580225c63', '645f580227113', 1),
('645f5d698325d', '645f5d698279f', '645f580228b03', '645f580229802', 1),
('645f5d69835c6', '645f5d698279f', '645f58022c121', '645f58022c88f', 1),
('645f5d69838e1', '645f5d698279f', '645f58022fc19', '645f580230134', 0),
('645f5d6983dca', '645f5d698279f', '645f580231dd1', '645f5802328c0', 1),
('645f5d6984429', '645f5d698279f', '645f580233f03', '645f580235486', 1),
('645f5d6984f50', '645f5d698279f', '645f5802363de', '645f58023888d', 1),
('645f5d698532e', '645f5d698279f', '645f580238db0', '645f58023a515', 1),
('645f5d698556a', '645f5d698279f', '645f58023af02', '645f58023cd73', 1),
('645f5d69857c0', '645f5d698279f', '645f58023dfba', '645f58023ea11', 1),
('645f5d6985bef', '645f5d698279f', '645f580241a20', '645f580242921', 1),
('645f5d6985e9b', '645f5d698279f', '645f58024388c', '645f580246f4d', 0),
('645f5d6986ba7', '645f5d698279f', '645f580247668', '645f5802483aa', 0),
('645f5d6986ee4', '645f5d698279f', '645f580248a2d', '645f580249a7f', 0),
('645f5d698722f', '645f5d698279f', '645f58024a4a6', '645f58024b835', 0),
('645f5d698748b', '645f5d698279f', '645f58024d2f9', '645f58024f279', 0),
('645f5d69876e6', '645f5d698279f', '645f5802500b3', '645f580251019', 1),
('645f5d6987b29', '645f5d698279f', '645f5802527f1', '645f580253100', 1),
('645f5d6987e1b', '645f5d698279f', '645f5802540bc', '645f5802517a0', 1),
('645f5d698822b', '645f5d698279f', '645f580254817', '645f580254d9f', 1),
('645f5f21179f6', '645f5f21171b2', '645f580225c63', '645f58022865f', 0),
('645f5f2118e88', '645f5f21171b2', '645f580228b03', '645f58022ae01', 0),
('645f5f211a68a', '645f5f21171b2', '645f58022c121', '645f58022e015', 0),
('645f5f211b550', '645f5f21171b2', '645f58022fc19', '645f580230e95', 0),
('645f5f211bccd', '645f5f21171b2', '645f580231dd1', '645f5802334d0', 0),
('645f5f211c59d', '645f5f21171b2', '645f580233f03', '645f580234d55', 0),
('645f5f211ccb3', '645f5f21171b2', '645f5802363de', '645f5802380ee', 0),
('645f5f211d1dc', '645f5f21171b2', '645f580238db0', '645f580239f06', 0),
('645f5f211d812', '645f5f21171b2', '645f58023af02', '645f58023b78e', 0),
('645f5f211dc48', '645f5f21171b2', '645f58023dfba', '645f58023ea11', 1),
('645f5f211e1f1', '645f5f21171b2', '645f580241a20', '645f580242921', 1),
('645f5f211e4ef', '645f5f21171b2', '645f58024388c', '645f580246812', 1),
('645f5f211e7ce', '645f5f21171b2', '645f580247668', '645f5802483aa', 0),
('645f5f211ec76', '645f5f21171b2', '645f580248a2d', '645f5802492bc', 1),
('645f5f211f2fc', '645f5f21171b2', '645f58024a4a6', '645f58024c4ac', 1),
('645f5f211fae7', '645f5f21171b2', '645f58024d2f9', '645f58024ea27', 1),
('645f5f2120646', '645f5f21171b2', '645f5802500b3', '645f580251b68', 0),
('645f5f21212df', '645f5f21171b2', '645f5802527f1', '645f580253100', 1),
('645f5f2121b3d', '645f5f21171b2', '645f5802540bc', '645f5802537c6', 0),
('645f5f2122215', '645f5f21171b2', '645f580254817', '645f580254d9f', 1),
('645f5f48102d3', '645f5f480fd47', '645f580225c63', '645f580227113', 1),
('645f5f4810793', '645f5f480fd47', '645f580228b03', '645f58022ae01', 0),
('645f5f4810a93', '645f5f480fd47', '645f58022c121', '645f58022c88f', 1),
('645f5f4810f18', '645f5f480fd47', '645f58022fc19', '645f580230625', 0),
('645f5f48117de', '645f5f480fd47', '645f580231dd1', '645f5802328c0', 1),
('645f5f4811b9d', '645f5f480fd47', '645f580233f03', '645f580235486', 1),
('645f5f4811f1e', '645f5f480fd47', '645f5802363de', '645f5802380ee', 0),
('645f5f4812254', '645f5f480fd47', '645f580238db0', '645f58023a515', 1),
('645f5f48128e1', '645f5f480fd47', '645f58023af02', '645f58023cd73', 1),
('645f5f4812e33', '645f5f480fd47', '645f58023dfba', '645f58023f210', 0),
('645f5f481312d', '645f5f480fd47', '645f580241a20', '645f580242921', 1),
('645f5f481340a', '645f5f480fd47', '645f58024388c', '645f58024637c', 0),
('645f5f481387f', '645f5f480fd47', '645f580247668', '645f5802483aa', 0),
('645f5f4813b9a', '645f5f480fd47', '645f580248a2d', '645f5802492bc', 1),
('645f5f4814030', '645f5f480fd47', '645f58024a4a6', '645f58024c4ac', 1),
('645f5f4814336', '645f5f480fd47', '645f58024d2f9', '645f58024f279', 0),
('645f5f481513f', '645f5f480fd47', '645f5802500b3', '645f580251019', 1),
('645f5f4815660', '645f5f480fd47', '645f5802527f1', '645f580253100', 1),
('645f5f481593a', '645f5f480fd47', '645f5802540bc', '645f5802537c6', 0),
('645f5f4815bba', '645f5f480fd47', '645f580254817', '645f5802553c7', 0),
('645f5f66c04b3', '645f5f66bff7e', '645f580225c63', '645f58022865f', 0),
('645f5f66c0afb', '645f5f66bff7e', '645f580228b03', '645f58022b9ee', 0),
('645f5f66c0e95', '645f5f66bff7e', '645f58022c121', '645f58022f4a6', 0),
('645f5f66c1841', '645f5f66bff7e', '645f58022fc19', '645f580230e95', 0),
('645f5f66c1be7', '645f5f66bff7e', '645f580231dd1', '645f5802334d0', 0),
('645f5f66c21ba', '645f5f66bff7e', '645f580233f03', '645f580235486', 1),
('645f5f66c26a3', '645f5f66bff7e', '645f5802363de', '645f5802380ee', 0),
('645f5f66c2a09', '645f5f66bff7e', '645f580238db0', '645f580239f06', 0),
('645f5f66c2eff', '645f5f66bff7e', '645f58023af02', '645f58023b78e', 0),
('645f5f66c3604', '645f5f66bff7e', '645f58023dfba', '645f58023f210', 0),
('645f5f66c38f5', '645f5f66bff7e', '645f580241a20', '645f580242921', 1),
('645f5f66c3b98', '645f5f66bff7e', '645f58024388c', '645f580246812', 1),
('645f5f66c41d5', '645f5f66bff7e', '645f580247668', '645f5802483aa', 0),
('645f5f66c4e7a', '645f5f66bff7e', '645f580248a2d', '645f580249a7f', 0),
('645f5f66c531a', '645f5f66bff7e', '645f58024a4a6', '645f58024b835', 0),
('645f5f66c55bd', '645f5f66bff7e', '645f58024d2f9', '645f58024ea27', 1),
('645f5f66c5833', '645f5f66bff7e', '645f5802500b3', '645f580251b68', 0),
('645f5f66c5a71', '645f5f66bff7e', '645f5802527f1', '645f5802537d5', 0),
('645f5f66c5e64', '645f5f66bff7e', '645f5802540bc', '645f5802537c6', 0),
('645f5f66c63cb', '645f5f66bff7e', '645f580254817', '645f5802553c7', 0),
('645f5fb01b485', '645f5fb01ad5e', '645f580225c63', '645f580227113', 1),
('645f5fb01b9a0', '645f5fb01ad5e', '645f580228b03', '645f58022ae01', 0),
('645f5fb01bd99', '645f5fb01ad5e', '645f58022c121', '645f58022c88f', 1),
('645f5fb01c44b', '645f5fb01ad5e', '645f58022fc19', '645f580230e95', 0),
('645f5fb01c8dd', '645f5fb01ad5e', '645f580231dd1', '645f5802328c0', 1),
('645f5fb01cced', '645f5fb01ad5e', '645f580233f03', '645f580235486', 1),
('645f5fb01d7d9', '645f5fb01ad5e', '645f5802363de', '645f58023888d', 1),
('645f5fb01dcba', '645f5fb01ad5e', '645f580238db0', '645f580239f06', 0),
('645f5fb01e53e', '645f5fb01ad5e', '645f58023af02', '645f58023b78e', 0),
('645f5fb01ea08', '645f5fb01ad5e', '645f58023dfba', '645f58023f210', 0),
('645f5fb01ece4', '645f5fb01ad5e', '645f580241a20', '645f580242921', 1),
('645f5fb01f1e6', '645f5fb01ad5e', '645f58024388c', '645f580246812', 1),
('645f5fb01fd3c', '645f5fb01ad5e', '645f580247668', '645f580247b75', 1),
('645f5fb0201a5', '645f5fb01ad5e', '645f580248a2d', '645f580249a7f', 0),
('645f5fb0204d3', '645f5fb01ad5e', '645f58024a4a6', '645f58024b835', 0),
('645f5fb020770', '645f5fb01ad5e', '645f58024d2f9', '645f58024f279', 0),
('645f5fb0209df', '645f5fb01ad5e', '645f5802500b3', '645f580251019', 1),
('645f5fb020d7f', '645f5fb01ad5e', '645f5802527f1', '645f580253100', 1),
('645f5fb0211ba', '645f5fb01ad5e', '645f5802540bc', '645f5802537c6', 0),
('645f5fb0214ca', '645f5fb01ad5e', '645f580254817', '645f5802553c7', 0),
('645f85a099238', '645f85a09806c', '645f580225c63', '645f58022865f', 0),
('645f85a09aaf0', '645f85a09806c', '645f580228b03', '645f58022b9ee', 0),
('645f85a09aea5', '645f85a09806c', '645f58022c121', '645f58022f4a6', 0),
('645f85a09b367', '645f85a09806c', '645f58022fc19', '645f58023161d', 1),
('645f85a09b759', '645f85a09806c', '645f580231dd1', '645f5802334d0', 0),
('645f85a09b9e8', '645f85a09806c', '645f580233f03', '645f580234d55', 0),
('645f85a09bc40', '645f85a09806c', '645f5802363de', '645f5802380ee', 0),
('645f85a09becb', '645f85a09806c', '645f580238db0', '645f580239f06', 0),
('645f85a09c6fd', '645f85a09806c', '645f58023af02', '645f58023cd73', 1),
('645f85a09c9aa', '645f85a09806c', '645f58023dfba', '645f58023f210', 0),
('645f85a09cbfa', '645f85a09806c', '645f580241a20', '645f580242921', 1),
('645f85a09cee7', '645f85a09806c', '645f58024388c', '645f58024637c', 0),
('645f85a09d529', '645f85a09806c', '645f580247668', '645f5802483aa', 0),
('645f85a09e519', '645f85a09806c', '645f580248a2d', '645f580249a7f', 0),
('645f85a09e862', '645f85a09806c', '645f58024a4a6', '645f58024ac7a', 0),
('645f85a09ebcd', '645f85a09806c', '645f58024d2f9', '645f58024db3b', 0),
('645f85a09f024', '645f85a09806c', '645f5802500b3', '645f5802505eb', 0),
('645f85a09f2aa', '645f85a09806c', '645f5802527f1', '645f5802537d5', 0),
('645f85a09f53d', '645f85a09806c', '645f5802540bc', '645f5802537c6', 0),
('645f85a0a043a', '645f85a09806c', '645f580254817', '645f5802553c7', 0),
('645f861612a8b', '645f86161253e', '645f580225c63', '645f58022777b', 0),
('645f861612d9c', '645f86161253e', '645f580228b03', '645f58022b9ee', 0),
('645f86161332a', '645f86161253e', '645f58022c121', '645f58022f4a6', 0),
('645f861613a2c', '645f86161253e', '645f58022fc19', '645f580230625', 0),
('645f861613e6b', '645f86161253e', '645f580231dd1', '645f5802334d0', 0),
('645f86161432b', '645f86161253e', '645f580233f03', '645f580234d55', 0),
('645f861614a03', '645f86161253e', '645f5802363de', '645f5802380ee', 0),
('645f861614f9e', '645f86161253e', '645f580238db0', '645f580239f06', 0),
('645f8616155ba', '645f86161253e', '645f58023af02', '645f58023b78e', 0),
('645f861615af3', '645f86161253e', '645f58023dfba', '645f58023f210', 0),
('645f861615e49', '645f86161253e', '645f580241a20', '645f580242921', 1),
('645f86161636c', '645f86161253e', '645f58024388c', '645f580245c5a', 0),
('645f8616167ea', '645f86161253e', '645f580247668', '645f5802483aa', 0),
('645f861616b7a', '645f86161253e', '645f580248a2d', '645f580249a7f', 0),
('645f861616de8', '645f86161253e', '645f58024a4a6', '645f58024ac7a', 0),
('645f861617035', '645f86161253e', '645f58024d2f9', '645f58024db3b', 0),
('645f861617a48', '645f86161253e', '645f5802500b3', '645f5802505eb', 0),
('645f861617e4b', '645f86161253e', '645f5802527f1', '645f5802537d5', 0),
('645f86161807f', '645f86161253e', '645f5802540bc', '645f5802537c6', 0),
('645f861618485', '645f86161253e', '645f580254817', '645f5802553c7', 0),
('645f86bf545ed', '645f86bf52f2f', '645f580225c63', '645f580227113', 1),
('645f86bf5514b', '645f86bf52f2f', '645f580228b03', '645f580229802', 1),
('645f86bf554e0', '645f86bf52f2f', '645f58022c121', '645f58022c88f', 1),
('645f86bf559db', '645f86bf52f2f', '645f58022fc19', '645f58023161d', 1),
('645f86bf564f1', '645f86bf52f2f', '645f580231dd1', '645f5802328c0', 1),
('645f86bf56868', '645f86bf52f2f', '645f580233f03', '645f580235486', 1),
('645f86bf56ced', '645f86bf52f2f', '645f5802363de', '645f58023888d', 1),
('645f86bf56fda', '645f86bf52f2f', '645f580238db0', '645f58023a515', 1),
('645f86bf5722f', '645f86bf52f2f', '645f58023af02', '645f58023cd73', 1),
('645f86bf5745c', '645f86bf52f2f', '645f58023dfba', '645f58023ea11', 1),
('645f86bf576dd', '645f86bf52f2f', '645f580241a20', '645f580242921', 1),
('645f86bf57937', '645f86bf52f2f', '645f58024388c', '645f58024637c', 0),
('645f86bf57e72', '645f86bf52f2f', '645f580247668', '645f5802483aa', 0),
('645f86bf580f8', '645f86bf52f2f', '645f580248a2d', '645f580249a7f', 0),
('645f86bf58336', '645f86bf52f2f', '645f58024a4a6', '645f58024b835', 0),
('645f86bf585ae', '645f86bf52f2f', '645f58024d2f9', '645f58024db3b', 0),
('645f86bf58896', '645f86bf52f2f', '645f5802500b3', '645f5802505eb', 0),
('645f86bf58cfe', '645f86bf52f2f', '645f5802527f1', '645f5802537d5', 0),
('645f86bf58f96', '645f86bf52f2f', '645f5802540bc', '645f5802537c6', 0),
('645f86bf5920b', '645f86bf52f2f', '645f580254817', '645f5802553c7', 0),
('645f8756628e3', '645f875661b47', '645f580225c63', '645f580226537', 0),
('645f8756630cb', '645f875661b47', '645f580228b03', '645f58022ae01', 0),
('645f87566403b', '645f875661b47', '645f58022c121', '645f58022d4aa', 0),
('645f875664cd7', '645f875661b47', '645f58022fc19', '645f580230625', 0),
('645f87566518b', '645f875661b47', '645f580231dd1', '645f5802334d0', 0),
('645f875665d99', '645f875661b47', '645f580233f03', '645f580235486', 1),
('645f87566687d', '645f875661b47', '645f5802363de', '645f58023888d', 1),
('645f875666c86', '645f875661b47', '645f580238db0', '645f58023a515', 1),
('645f8756670bb', '645f875661b47', '645f58023af02', '645f58023cd73', 1),
('645f8756676dc', '645f875661b47', '645f58023dfba', '645f58023ea11', 1),
('645f875667ac4', '645f875661b47', '645f580241a20', '645f580242921', 1),
('645f875667ec8', '645f875661b47', '645f58024388c', '645f580246812', 1),
('645f87566821f', '645f875661b47', '645f580247668', '645f580247b75', 1),
('645f875668796', '645f875661b47', '645f580248a2d', '645f5802492bc', 1),
('645f875668b3a', '645f875661b47', '645f58024a4a6', '645f58024c4ac', 1),
('645f875668f74', '645f875661b47', '645f58024d2f9', '645f58024ea27', 1),
('645f875669577', '645f875661b47', '645f5802500b3', '645f580251019', 1),
('645f87566981a', '645f875661b47', '645f5802527f1', '645f580253100', 1),
('645f875669b32', '645f875661b47', '645f5802540bc', '645f5802517a0', 1),
('645f875669e90', '645f875661b47', '645f580254817', '645f580254d9f', 1),
('645f87cea7ec8', '645f87cea45d0', '645f580225c63', '645f580227113', 1),
('645f87cea882f', '645f87cea45d0', '645f580228b03', '645f580229802', 1),
('645f87cea8d50', '645f87cea45d0', '645f58022c121', '645f58022c88f', 1),
('645f87cea90a8', '645f87cea45d0', '645f58022fc19', '645f58023161d', 1),
('645f87cea9526', '645f87cea45d0', '645f580231dd1', '645f5802328c0', 1),
('645f87cea97ea', '645f87cea45d0', '645f580233f03', '645f580235486', 1),
('645f87cea9f0a', '645f87cea45d0', '645f5802363de', '645f58023888d', 1),
('645f87ceaa3b2', '645f87cea45d0', '645f580238db0', '645f580239f06', 0),
('645f87ceaa79d', '645f87cea45d0', '645f58023af02', '645f58023cd73', 1),
('645f87ceaac0c', '645f87cea45d0', '645f58023dfba', '645f58023ea11', 1),
('645f87ceab8c6', '645f87cea45d0', '645f580241a20', '645f580242921', 1),
('645f87ceabdbb', '645f87cea45d0', '645f58024388c', '645f580246812', 1),
('645f87ceac030', '645f87cea45d0', '645f580247668', '645f5802483aa', 0),
('645f87ceac328', '645f87cea45d0', '645f580248a2d', '645f580249a7f', 0),
('645f87ceac693', '645f87cea45d0', '645f58024a4a6', '645f58024c4ac', 1),
('645f87ceacd54', '645f87cea45d0', '645f58024d2f9', '645f58024ea27', 1),
('645f87cead127', '645f87cea45d0', '645f5802500b3', '645f580251019', 1),
('645f87cead683', '645f87cea45d0', '645f5802527f1', '645f580253100', 1),
('645f87ceadb7b', '645f87cea45d0', '645f5802540bc', '645f5802517a0', 1),
('645f87ceade22', '645f87cea45d0', '645f580254817', '645f5802553c7', 0),
('645f87fa70b93', '645f87fa6d306', '645f580225c63', '645f580226537', 0),
('645f87fa71892', '645f87fa6d306', '645f580228b03', '645f58022b9ee', 0),
('645f87fa71c0f', '645f87fa6d306', '645f58022c121', '645f58022d4aa', 0),
('645f87fa71e62', '645f87fa6d306', '645f58022fc19', '645f580230e95', 0),
('645f87fa72276', '645f87fa6d306', '645f580231dd1', '645f5802328c0', 1),
('645f87fa725e0', '645f87fa6d306', '645f580233f03', '645f580234d55', 0),
('645f87fa728c7', '645f87fa6d306', '645f5802363de', '645f5802380ee', 0),
('645f87fa72b01', '645f87fa6d306', '645f580238db0', '645f580239f06', 0),
('645f87fa72d3f', '645f87fa6d306', '645f58023af02', '645f58023b78e', 0),
('645f87fa731e7', '645f87fa6d306', '645f58023dfba', '645f58023f210', 0),
('645f87fa735c5', '645f87fa6d306', '645f580241a20', '645f580242921', 1),
('645f87fa738b6', '645f87fa6d306', '645f58024388c', '645f580245c5a', 0),
('645f87fa73af7', '645f87fa6d306', '645f580247668', '645f5802483aa', 0),
('645f87fa73dc9', '645f87fa6d306', '645f580248a2d', '645f5802492bc', 1),
('645f87fa74333', '645f87fa6d306', '645f58024a4a6', '645f58024ac7a', 0),
('645f87fa749d4', '645f87fa6d306', '645f58024d2f9', '645f58024db3b', 0),
('645f87fa74d50', '645f87fa6d306', '645f5802500b3', '645f5802505eb', 0),
('645f87fa752c0', '645f87fa6d306', '645f5802527f1', '645f580253100', 1),
('645f87fa7592c', '645f87fa6d306', '645f5802540bc', '645f5802537c6', 0),
('645f87fa75b94', '645f87fa6d306', '645f580254817', '645f580254d9f', 1),
('645f883592f20', '645f883592900', '645f580225c63', '645f580227113', 1),
('645f883593781', '645f883592900', '645f580228b03', '645f58022b4d6', 0),
('645f883594700', '645f883592900', '645f58022c121', '645f58022d4aa', 0),
('645f883594a34', '645f883592900', '645f58022fc19', '645f580230134', 0),
('645f883594ec6', '645f883592900', '645f580231dd1', '645f5802328c0', 1),
('645f883595401', '645f883592900', '645f580233f03', '645f580234d55', 0),
('645f8835956a0', '645f883592900', '645f5802363de', '645f58023888d', 1),
('645f883595919', '645f883592900', '645f580238db0', '645f580239f06', 0),
('645f883595c04', '645f883592900', '645f58023af02', '645f58023cd73', 1),
('645f883595ef0', '645f883592900', '645f58023dfba', '645f58023ea11', 1),
('645f8835961c5', '645f883592900', '645f580241a20', '645f580242921', 1),
('645f8835966c7', '645f883592900', '645f58024388c', '645f580246812', 1),
('645f8835989ee', '645f883592900', '645f580247668', '645f580247b75', 1),
('645f883598ebe', '645f883592900', '645f580248a2d', '645f580249a7f', 0),
('645f88359943a', '645f883592900', '645f58024a4a6', '645f58024b835', 0),
('645f883599a40', '645f883592900', '645f58024d2f9', '645f58024ea27', 1),
('645f883599ed6', '645f883592900', '645f5802500b3', '645f580251b68', 0),
('645f88359a3a1', '645f883592900', '645f5802527f1', '645f580253100', 1),
('645f88359a681', '645f883592900', '645f5802540bc', '645f5802517a0', 1),
('645f88359a942', '645f883592900', '645f580254817', '645f5802553c7', 0),
('645f8876b7c72', '645f8876b772e', '645f580225c63', '645f580227113', 1),
('645f8876b8586', '645f8876b772e', '645f580228b03', '645f580229802', 1),
('645f8876b8c04', '645f8876b772e', '645f58022c121', '645f58022c88f', 1),
('645f8876b9538', '645f8876b772e', '645f58022fc19', '645f58023161d', 1),
('645f8876b9e04', '645f8876b772e', '645f580231dd1', '645f5802328c0', 1),
('645f8876ba13e', '645f8876b772e', '645f580233f03', '645f580235486', 1),
('645f8876ba5a1', '645f8876b772e', '645f5802363de', '645f58023888d', 1),
('645f8876ba820', '645f8876b772e', '645f580238db0', '645f58023a515', 1),
('645f8876baa69', '645f8876b772e', '645f58023af02', '645f58023cd73', 1),
('645f8876bac94', '645f8876b772e', '645f58023dfba', '645f58023ea11', 1),
('645f8876baea6', '645f8876b772e', '645f580241a20', '645f580242921', 1),
('645f8876bb1cc', '645f8876b772e', '645f58024388c', '645f580246812', 1),
('645f8876bb5f5', '645f8876b772e', '645f580247668', '645f580247b75', 1),
('645f8876bb8c0', '645f8876b772e', '645f580248a2d', '645f5802492bc', 1),
('645f8876bbb53', '645f8876b772e', '645f58024a4a6', '645f58024c4ac', 1),
('645f8876bbe03', '645f8876b772e', '645f58024d2f9', '645f58024ea27', 1),
('645f8876bc0dd', '645f8876b772e', '645f5802500b3', '645f580251019', 1),
('645f8876bcb38', '645f8876b772e', '645f5802527f1', '645f580253100', 1),
('645f8876bcee1', '645f8876b772e', '645f5802540bc', '645f5802517a0', 1),
('645f8876bd887', '645f8876b772e', '645f580254817', '645f580254d9f', 1),
('645fadaa03f71', '645fadaa02aab', '645dd7ab24945', '645dd7ab27875', 1),
('645fadaa046a2', '645fadaa02aab', '645dd7ab29265', '645dd7ab2a6cf', 1),
('645fadaa04ca8', '645fadaa02aab', '645dd7ab2b7a6', '645dd7ab2e031', 1),
('645fae7476a1e', '645fae747313e', '645dfd94f414e', '645dfd9501004', 0),
('645fae7476f19', '645fae747313e', '645dfd95056f3', '645dfd950a0d0', 1),
('645fae815d178', '645fae8159cf7', '645dfd94f414e', '645dfd9502071', 1),
('645fae815ebf7', '645fae8159cf7', '645dfd95056f3', '645dfd950a0d0', 1),
('645fb54bb3a79', '645fb54bafc0a', '645dd7ab24945', '645dd7ab27875', 1),
('645fb54bb55d9', '645fb54bafc0a', '645dd7ab29265', '645dd7ab2a2c7', 0),
('645fb54bb7bdc', '645fb54bafc0a', '645dd7ab2b7a6', '645dd7ab2e031', 1),
('645fb55a2a6b6', '645fb55a29fdd', '645dd7ab24945', '645dd7ab27875', 1),
('645fb55a2b1cb', '645fb55a29fdd', '645dd7ab29265', '645dd7ab2a6cf', 1),
('645fb55a2b95f', '645fb55a29fdd', '645dd7ab2b7a6', '645dd7ab2e031', 1),
('645fb7ae09e27', '645fb7ae0949c', '645fb69d7a202', '645fb69d7ac52', 1),
('645fb7ae0a1f5', '645fb7ae0949c', '645fb69d7d32f', '645fb69d7e6b2', 1),
('645fb89369992', '645fb89368a0d', '645d3b719ab95', '645d3b719b0e6', 1),
('645fb8936a3e9', '645fb89368a0d', '645d3b719db0c', '645d3b719f272', 1),
('645fb90e26d09', '645fb90e25763', '645f580225c63', '645f580227113', 1),
('645fb90e2747b', '645fb90e25763', '645f580228b03', '645f580229802', 1),
('645fb90e27abc', '645fb90e25763', '645f58022c121', '645f58022c88f', 1),
('645fb90e27f99', '645fb90e25763', '645f58022fc19', '645f580230625', 0),
('645fb90e282cb', '645fb90e25763', '645f580231dd1', '645f5802328c0', 1),
('645fb90e28597', '645fb90e25763', '645f580233f03', '645f580235486', 1),
('645fb90e288b3', '645fb90e25763', '645f5802363de', '645f58023888d', 1),
('645fb90e28f67', '645fb90e25763', '645f580238db0', '645f58023a515', 1),
('645fb90e295dc', '645fb90e25763', '645f58023af02', '645f58023cd73', 1),
('645fb90e298e2', '645fb90e25763', '645f58023dfba', '645f58023ea11', 1),
('645fb90e29bae', '645fb90e25763', '645f580241a20', '645f580242921', 1),
('645fb90e2a05a', '645fb90e25763', '645f58024388c', '645f580246812', 1),
('645fb90e2a397', '645fb90e25763', '645f580247668', '645f580247b75', 1),
('645fb90e2a6b3', '645fb90e25763', '645f580248a2d', '645f580249a7f', 0),
('645fb90e2aa0b', '645fb90e25763', '645f58024a4a6', '645f58024c4ac', 1),
('645fb90e2b656', '645fb90e25763', '645f58024d2f9', '645f58024ea27', 1),
('645fb90e2b8fb', '645fb90e25763', '645f5802500b3', '645f580251019', 1),
('645fb90e2bcfd', '645fb90e25763', '645f5802527f1', '645f580253100', 1),
('645fb90e2bf77', '645fb90e25763', '645f5802540bc', '645f5802517a0', 1),
('645fb90e2c19f', '645fb90e25763', '645f580254817', '645f5802553c7', 0),
('645fc238994d7', '645fc238975d5', '645fb69d7a202', '645fb69d7ac52', 1),
('645fc238998e8', '645fc238975d5', '645fb69d7d32f', '645fb69d7e6b2', 1),
('6460cbd36cec9', '6460cbd36c44c', '645fbe8e9a822', '645fbe8e9cafa', 1),
('6460cbd36d646', '6460cbd36c44c', '645fbe8e9d6d8', '645fbe8e9db56', 1),
('6461d97512e1d', '6461d97511782', '645fbe8e9a822', '645fbe8e9cafa', 1),
('6461d97513401', '6461d97511782', '645fbe8e9d6d8', '645fbe8e9e417', 0);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `User_id` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `gradeLevel` varchar(20) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  `organization` varchar(100) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`User_id`, `email`, `username`, `password`, `avatar`, `gradeLevel`, `role`, `organization`, `active`, `reason`) VALUES
('645cd995bbe5b', 'theanh@gmail.com', 'Thế Anh', '202cb962ac59075b964b07152d234b70', '645cd995bbe5b.jpg', '12', 'Student', 'Ca Van Thinh High School', 1, ''),
('645d1978e7b32', 'user@gmail.com', 'Nguoi dung', '202cb962ac59075b964b07152d234b70', 'NULL', '1', 'Student', 'Free', 0, 'The web is inconvenient'),
('645d366e36958', 'thanhnga@gmail.com', 'Thanh Nga', '202cb962ac59075b964b07152d234b70', '645d366e36958.jpg', 'Higher education', 'Student', 'Ton Duc Thang University', 1, ''),
('645efec3db82e', 'tu@gmail.com', 'Tú', '202cb962ac59075b964b07152d234b70', '645efec3db82e.jpg', 'Higher education', 'Student', 'Ton Duc Thang University', 1, ''),
('645eff394fc75', 'tuan@gmail.com', 'Tuấn', '202cb962ac59075b964b07152d234b70', '645eff394fc75.jpg', '12', 'Student', 'Ca Van Thinh High School', 1, ''),
('645eff5ca7a73', 'ngoc@gmail.com', 'Ngọc', '202cb962ac59075b964b07152d234b70', 'NULL', 'NULL', 'Teacher', 'Ton Duc Thang University', 1, ''),
('645eff9904329', 'trinh@gmail.com', 'Trinh', '202cb962ac59075b964b07152d234b70', '645eff9904329.jpg', 'NULL', 'Teacher', 'Ca Van Thinh High School', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `Option`
--
ALTER TABLE `Option`
  ADD PRIMARY KEY (`Option_id`),
  ADD KEY `Question_id` (`Question_id`);

--
-- Indexes for table `Question`
--
ALTER TABLE `Question`
  ADD PRIMARY KEY (`Question_id`),
  ADD KEY `Quiz_id` (`Quiz_id`);

--
-- Indexes for table `Quiz`
--
ALTER TABLE `Quiz`
  ADD PRIMARY KEY (`Quiz_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `Category_id` (`Category_id`);

--
-- Indexes for table `Report`
--
ALTER TABLE `Report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `Response`
--
ALTER TABLE `Response`
  ADD PRIMARY KEY (`Response_id`),
  ADD KEY `Quiz_id` (`Quiz_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `ResponseDetails`
--
ALTER TABLE `ResponseDetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Response_id` (`Response_id`),
  ADD KEY `Question_id` (`Question_id`),
  ADD KEY `Option_id` (`Option_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`User_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Option`
--
ALTER TABLE `Option`
  ADD CONSTRAINT `Option_ibfk_1` FOREIGN KEY (`Question_id`) REFERENCES `Question` (`Question_id`);

--
-- Constraints for table `Question`
--
ALTER TABLE `Question`
  ADD CONSTRAINT `Question_ibfk_1` FOREIGN KEY (`Quiz_id`) REFERENCES `Quiz` (`Quiz_id`);

--
-- Constraints for table `Quiz`
--
ALTER TABLE `Quiz`
  ADD CONSTRAINT `Quiz_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `User` (`User_id`),
  ADD CONSTRAINT `Quiz_ibfk_2` FOREIGN KEY (`Category_id`) REFERENCES `Category` (`Category_id`);

--
-- Constraints for table `Report`
--
ALTER TABLE `Report`
  ADD CONSTRAINT `Report_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`User_id`),
  ADD CONSTRAINT `Report_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `Quiz` (`Quiz_id`);

--
-- Constraints for table `Response`
--
ALTER TABLE `Response`
  ADD CONSTRAINT `Response_ibfk_1` FOREIGN KEY (`Quiz_id`) REFERENCES `Quiz` (`Quiz_id`),
  ADD CONSTRAINT `Response_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `User` (`User_id`);

--
-- Constraints for table `ResponseDetails`
--
ALTER TABLE `ResponseDetails`
  ADD CONSTRAINT `ResponseDetails_ibfk_1` FOREIGN KEY (`Response_id`) REFERENCES `Response` (`Response_id`),
  ADD CONSTRAINT `ResponseDetails_ibfk_2` FOREIGN KEY (`Question_id`) REFERENCES `Question` (`Question_id`),
  ADD CONSTRAINT `ResponseDetails_ibfk_3` FOREIGN KEY (`Option_id`) REFERENCES `Option` (`Option_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
