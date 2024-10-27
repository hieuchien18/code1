-- Table structure for table [admin]
CREATE TABLE [admin] (
  [id] int IDENTITY(1,1) NOT NULL,
  [FullName] varchar(100) NULL,
  [AdminEmail] varchar(120) NULL,
  [UserName] varchar(100) NOT NULL,
  [Password] varchar(100) NOT NULL,
  [updationDate] datetime NOT NULL DEFAULT GETDATE(),
  PRIMARY KEY ([id])
);
GO

-- Dumping data for table [admin]
SET IDENTITY_INSERT [admin] ON;

INSERT INTO [admin] ([id], [FullName], [AdminEmail], [UserName], [Password], [updationDate]) VALUES
(1, 'Kumar Pandule', 'kumarpandule@gmail.com', 'admin', 'hieudz', '2021-06-28 16:06:08');
  
SET IDENTITY_INSERT [admin] OFF;
GO

-- Table structure for table [tblauthors]
CREATE TABLE [tblauthors] (
  [id] int IDENTITY(1,1) NOT NULL,
  [AuthorName] varchar(159) NULL,
  [creationDate] datetime2 DEFAULT CURRENT_TIMESTAMP,
  [UpdationDate] datetime2 NULL,
  PRIMARY KEY ([id])
);
GO

-- Dumping data for table [tblauthors]
SET IDENTITY_INSERT [tblauthors] ON;

INSERT INTO [tblauthors] ([id], [AuthorName], [creationDate], [UpdationDate]) VALUES
(1, 'Kumar Pandule', '2017-07-08 12:49:09', '2021-06-28 16:03:28'),
(2, 'Kumar', '2017-07-08 14:30:23', '2021-06-28 16:03:35'),
(3, 'Rahul', '2017-07-08 14:35:08', '2021-06-28 16:03:43'),
(4, 'HC Verma', '2017-07-08 14:35:21', NULL),
(5, 'R.D. Sharma ', '2017-07-08 14:35:36', NULL),
(9, 'fwdfrwer', '2017-07-08 15:22:03', NULL);
  
SET IDENTITY_INSERT [tblauthors] OFF;
GO

-- Table structure for table [tblbooks]
CREATE TABLE [tblbooks] (
  [id] int IDENTITY(1,1) NOT NULL,
  [BookName] varchar(255) NULL,
  [CatId] int NULL,
  [AuthorId] int NULL,
  [ISBNNumber] int NULL,
  [BookPrice] int NULL,
  [RegDate] datetime2 DEFAULT CURRENT_TIMESTAMP,
  [UpdationDate] datetime2 NULL,
  PRIMARY KEY ([id])
);
GO

-- Dumping data for table [tblbooks]
SET IDENTITY_INSERT [tblbooks] ON;

INSERT INTO [tblbooks] ([id], [BookName], [CatId], [AuthorId], [ISBNNumber], [BookPrice], [RegDate], [UpdationDate]) VALUES
(1, 'PHP And MySql programming', 5, 1, 222333, 20, '2017-07-08 20:04:55', '2017-07-15 05:54:41'),
(3, 'physics', 6, 4, 1111, 15, '2017-07-08 20:17:31', '2017-07-15 06:13:17');
  
SET IDENTITY_INSERT [tblbooks] OFF;
GO

-- Table structure for table [tblcategory]
CREATE TABLE [tblcategory] (
  [id] int IDENTITY(1,1) NOT NULL,
  [CategoryName] varchar(150) NULL,
  [Status] int NULL,
  [CreationDate] datetime2 DEFAULT CURRENT_TIMESTAMP,
  [UpdationDate] datetime2 NULL,
  PRIMARY KEY ([id])
);
GO

-- Dumping data for table [tblcategory]
SET IDENTITY_INSERT [tblcategory] ON;

INSERT INTO [tblcategory] ([id], [CategoryName], [Status], [CreationDate], [UpdationDate]) VALUES
(4, 'Romantic', 1, '2017-07-04 18:35:25', '2017-07-06 16:00:42'),
(5, 'Technology', 1, '2017-07-04 18:35:39', '2017-07-08 17:13:03'),
(6, 'Science', 1, '2017-07-04 18:35:55', NULL),
(7, 'Management', 0, '2017-07-04 18:36:16', NULL);
  
SET IDENTITY_INSERT [tblcategory] OFF;
GO

-- Table structure for table [tblissuedbookdetails]
CREATE TABLE [tblissuedbookdetails] (
  [id] int IDENTITY(1,1) NOT NULL,
  [BookId] int NULL,
  [StudentID] varchar(150) NULL,
  [IssuesDate] datetime2 DEFAULT CURRENT_TIMESTAMP,
  [ReturnDate] datetime2 NULL,
  [RetrunStatus] int NULL,
  [fine] int NULL,
  PRIMARY KEY ([id])
);
GO

-- Dumping data for table [tblissuedbookdetails]
SET IDENTITY_INSERT [tblissuedbookdetails] ON;

INSERT INTO [tblissuedbookdetails] ([id], [BookId], [StudentID], [IssuesDate], [ReturnDate], [RetrunStatus], [fine]) VALUES
(1, 1, 'SID002', '2017-07-15 06:09:47', '2017-07-15 11:15:20', 1, 0),
(2, 1, 'SID002', '2017-07-15 06:12:27', '2017-07-15 11:15:23', 1, 5),
(3, 3, 'SID002', '2017-07-15 06:13:40', NULL, 0, NULL),
(4, 3, 'SID002', '2017-07-15 06:23:23', '2017-07-15 11:22:29', 1, 2),
(5, 1, 'SID009', '2017-07-15 10:59:26', NULL, 0, NULL),
(6, 3, 'SID011', '2017-07-15 18:02:55', NULL, 0, NULL);

SET IDENTITY_INSERT [tblissuedbookdetails] OFF;
GO

-- Table structure for table [tblstudents]
CREATE TABLE [tblstudents] (
  [id] int IDENTITY(1,1) NOT NULL,
  [StudentId] varchar(100) NULL,
  [FullName] varchar(120) NULL,
  [EmailId] varchar(120) NULL,
  [MobileNumber] char(11) NULL,
  [Password] varchar(120) NULL,
  [Status] int NULL,
  [RegDate] datetime2 DEFAULT CURRENT_TIMESTAMP,
  [UpdationDate] datetime2 NULL,
  PRIMARY KEY ([id]),
  UNIQUE ([StudentId])
);
GO

-- Dumping data for table [tblstudents]
SET IDENTITY_INSERT [tblstudents] ON;

INSERT INTO [tblstudents] ([id], [StudentId], [FullName], [EmailId], [MobileNumber], [Password], [Status], [RegDate], [UpdationDate]) VALUES
(1, 'SID002', 'Anuj kumar', 'anuj.lpu1@gmail.com', '9865472555', 'f925916e2754e5e03f75dd58a5733251', 1, '2017-07-11 15:37:05', '2017-07-15 18:26:21'),
(4, 'SID005', 'sdfsd', 'csfsd@dfsfks.com', '8569710025', '92228410fc8b872914e023160cf4ae8f', 0, '2017-07-11 15:41:27', '2017-07-15 17:43:03'),
(8, 'SID009', 'test', 'test@gmail.com', '2359874527', 'f925916e2754e5e03f75dd58a5733251', 1, '2017-07-11 15:58:28', '2017-07-15 13:42:44'),
(9, 'SID010', 'Amit', 'amit@gmail.com', '8585856224', 'f925916e2754e5e03f75dd58a5733251', 1, '2017-07-15 13:40:30', NULL),
(10, 'SID011', 'Sarita Pandey', 'sarita@gmail.com', '4672423754', 'f925916e2754e5e03f75dd58a5733251', 1, '2017-07-15 18:00:59', NULL);

SET IDENTITY_INSERT [tblstudents] OFF;
GO
